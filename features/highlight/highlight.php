<?php
// Highlight extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/highlight
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowHighlight {
    const VERSION = "0.8.2";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("highlightClass", "highlight");
        $this->yellow->system->setDefault("highlightLineNumber", "0");
        $this->yellow->system->setDefault("highlightAutodetectLanguages", "html, css, javascript, php");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if (!empty($name) && $type=="code") {
            list($language, $class, $id, $lineNumber) = $this->getHighlightInformation($name);
            if (!empty($language)) {
                list($language, $text) = $this->highlight($language, $text);
                $output = "<pre";
                if (!empty($class)) $output .= " class=\"".htmlspecialchars($class)."\"";
                if (!empty($id)) $output .= " id=\"".htmlspecialchars($id)."\"";
                $output .= ">";
                if (!$lineNumber) {
                    $output .= "<code class=\"".htmlspecialchars("language-$language")."\">".$text."</code>";
                } else {
                    $output .= "<code class=\"".htmlspecialchars("language-$language hljs-with-line-number")."\">";
                    foreach ($this->yellow->toolbox->getTextLines($text) as $line) {
                        $output .= "<span class=\"hljs-line-number\"></span>$line";
                    }
                    $output .= "</code>";
                }
                $output .= "</pre>";
            }
        }
        return $output;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $extensionLocation = $this->yellow->system->get("serverBase").$this->yellow->system->get("extensionLocation");
            $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$extensionLocation}highlight.css\" />\n";
        }
        return $output;
    }
    
    // Highlight
    public function highlight($language, $text) {
        $highlighter = new Highlighter();
        $autodetectLanguages = preg_split("/\s*,\s*/", $this->yellow->system->get("highlightAutodetectLanguages"));
        if (!in_array($language, $autodetectLanguages)) array_push($autodetectLanguages, $language);
        foreach ($autodetectLanguages as $autodetectLanguage) {
            list($languageId, $fileName) = $this->getLanguageInformation($autodetectLanguage);
            if (is_readable($fileName)) $highlighter->registerLanguage($languageId, $fileName);
        }
        try {
            $highlighter->setAutodetectLanguages($autodetectLanguages);
            $result = $highlighter->highlight($language, $text);
            $language = $result->language;
            $text = $result->value;
        } catch (DomainException $e) {
            $language = "unknown";
        }
        return array($language, $text);
    }
    
    // Return highlight information
    public function getHighlightInformation($name) {
        $class = $this->yellow->system->get("highlightClass");
        $lineNumber = intval($this->yellow->system->get("highlightLineNumber"));
        foreach (explode(" ", $name) as $token) {
            if (preg_match("/^[\w]+$/", $token) && empty($language)) $language = $token;
            if ($token[0]==".") $class = $class." ".substru($token, 1);
            if ($token[0]=="#") $id = substru($token, 1);
        }
        if (preg_match("/with-line-number/i", $class)) $lineNumber = true;
        if (preg_match("/without-line-number/i", $class)) $lineNumber = false;
        return array($language, $class, $id, $lineNumber);
    }
    
    // Return language information
    public function getLanguageInformation($language) {
        $aliases = array("c" => "cpp", "html" => "xml");
        $language = isset($aliases[$language]) ? $aliases[$language] : $language;
        $fileName = $this->yellow->system->get("extensionDir")."highlight-$language.json";
        return array($language, $fileName);
    }
}

/* Highlight.php, https://github.com/scrivo/highlight.php
 * Copyright © 2006-2013, Ivan Sagalaev (maniac@softwaremaniacs.org), highlight.js (original author)
 * Copyright © 2013, Geert Bergman (geert@scrivo.nl), highlight.php
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 * 3. Neither the name of "highlight.js", "highlight.php", nor the names of its
 *    contributors may be used to endorse or promote products derived from this
 *    software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

class Highlighter
{
    const SPAN_END_TAG = "</span>";

    private $options;

    private $modeBuffer = "";
    private $result = "";
    private $top = null;
    private $language = null;
    private $keywordCount = 0;
    private $relevance = 0;
    private $ignoreIllegals = false;

    private static $classMap = array();
    private static $languages = null;
    private static $aliases = null;

    private $autodetectSet = array(
        "xml", "json", "javascript", "css", "php", "http",
    );

    public function __construct()
    {
        $this->options = array(
            'classPrefix' => 'hljs-',
            'tabReplace' => null,
            'useBR' => false,
            'languages' => null,
        );

        self::registerLanguages();
    }

    private static function registerLanguages()
    {
        // Languages that take precedence in the classMap array.
        $languagePath = __DIR__ . DIRECTORY_SEPARATOR . "languages" . DIRECTORY_SEPARATOR;
        foreach (array("xml", "django", "javascript", "matlab", "cpp") as $languageId) {
            $filePath = $languagePath . $languageId . ".json";
            if (is_readable($filePath)) {
                self::registerLanguage($languageId, $filePath);
            }
        }

        $d = @dir($languagePath);
        if ($d) {
            while (($entry = $d->read()) !== false) {
                if (substr($entry, -5) === ".json") {
                    $languageId = substr($entry, 0, -5);
                    $filePath = $languagePath . $entry;
                    if (is_readable($filePath)) {
                        self::registerLanguage($languageId, $filePath);
                    }
                }
            }
            $d->close();
        }

        self::$languages = array_keys(self::$classMap);
    }

    /**
     * Register a language definition with the Highlighter's internal language
     * storage. Languages are stored in a static variable, so they'll be available
     * across all instances. You only need to register a language once.
     *
     * @param string $languageId The unique name of a language
     * @param string $filePath   The file path to the language definition
     * @param bool   $overwrite  Overwrite language if it already exists
     *
     * @return Language The object containing the definition for a language's markup
     */
    public static function registerLanguage($languageId, $filePath, $overwrite = false)
    {
        if (!isset(self::$classMap[$languageId]) || $overwrite) {
            $lang = new Language($languageId, $filePath);
            self::$classMap[$languageId] = $lang;

            if (isset($lang->mode->aliases)) {
                foreach ($lang->mode->aliases as $alias) {
                    self::$aliases[$alias] = $languageId;
                }
            }
        }

        return self::$classMap[$languageId];
    }

    private function testRe($re, $lexeme)
    {
        if (!$re) {
            return false;
        }
        $test = preg_match($re, $lexeme, $match, PREG_OFFSET_CAPTURE);
        if ($test === false) {
            throw new \Exception("Invalid regexp: " . var_export($re, true));
        }

        return count($match) && ($match[0][1] == 0);
    }

    private function escapeRe($value)
    {
        return sprintf('/%s/m', preg_quote($value));
    }

    private function subMode($lexeme, $mode)
    {
        for ($i = 0; $i < count($mode->contains); ++$i) {
            if ($this->testRe($mode->contains[$i]->beginRe, $lexeme)) {
                if ($mode->contains[$i]->endSameAsBegin) {
                    $matches = array();
                    preg_match($mode->contains[$i]->beginRe, $lexeme, $matches);

                    $mode->contains[$i]->endRe = $this->escapeRe($matches[0]);
                }

                return $mode->contains[$i];
            }
        }
    }

    private function endOfMode($mode, $lexeme)
    {
        if ($this->testRe($mode->endRe, $lexeme)) {
            while ($mode->endsParent && $mode->parent) {
                $mode = $mode->parent;
            }

            return $mode;
        }
        if ($mode->endsWithParent) {
            return $this->endOfMode($mode->parent, $lexeme);
        }
    }

    private function isIllegal($lexeme, $mode)
    {
        return !$this->ignoreIllegals && $this->testRe($mode->illegalRe, $lexeme);
    }

    private function keywordMatch($mode, $match)
    {
        $kwd = $this->language->caseInsensitive ? mb_strtolower($match[0], "UTF-8") : $match[0];

        return isset($mode->keywords[$kwd]) ? $mode->keywords[$kwd] : null;
    }

    private function buildSpan($classname, $insideSpan, $leaveOpen = false, $noPrefix = false)
    {
        $classPrefix = $noPrefix ? "" : $this->options['classPrefix'];
        $openSpan = "<span class=\"" . $classPrefix;
        $closeSpan = $leaveOpen ? "" : self::SPAN_END_TAG;

        $openSpan .= $classname . "\">";

        return $openSpan . $insideSpan . $closeSpan;
    }

    private function escape($value)
    {
        return htmlspecialchars($value, ENT_NOQUOTES);
    }

    private function processKeywords()
    {
        if (empty($this->top->keywords)) {
            return $this->escape($this->modeBuffer);
        }

        $result = "";
        $lastIndex = 0;

        /* TODO: when using the crystal language file on django and twigs code
         * the values of $this->top->lexemesRe can become "" (empty). Check
         * if this behaviour is consistent with highlight.js.
         */
        if ($this->top->lexemesRe) {
            while (preg_match($this->top->lexemesRe, $this->modeBuffer, $match, PREG_OFFSET_CAPTURE, $lastIndex)) {
                $result .= $this->escape(substr($this->modeBuffer, $lastIndex, $match[0][1] - $lastIndex));
                $keyword_match = $this->keywordMatch($this->top, $match[0]);

                if ($keyword_match) {
                    $this->relevance += $keyword_match[1];
                    $result .= $this->buildSpan($keyword_match[0], $this->escape($match[0][0]));
                } else {
                    $result .= $this->escape($match[0][0]);
                }

                $lastIndex = strlen($match[0][0]) + $match[0][1];
            }
        }

        return $result . $this->escape(substr($this->modeBuffer, $lastIndex));
    }

    private function processSubLanguage()
    {
        try {
            $hl = new Highlighter();
            $hl->setAutodetectLanguages($this->autodetectSet);

            $explicit = is_string($this->top->subLanguage);
            if ($explicit && !in_array($this->top->subLanguage, self::$languages)) {
                return $this->escape($this->modeBuffer);
            }

            if ($explicit) {
                $res = $hl->highlight(
                    $this->top->subLanguage,
                    $this->modeBuffer,
                    true,
                    isset($this->continuations[$this->top->subLanguage]) ? $this->continuations[$this->top->subLanguage] : null
                );
            } else {
                $res = $hl->highlightAuto(
                    $this->modeBuffer,
                    count($this->top->subLanguage) ? $this->top->subLanguage : null
                );
            }
            // Counting embedded language score towards the host language may
            // be disabled with zeroing the containing mode relevance. Usecase
            // in point is Markdown that allows XML everywhere and makes every
            // XML snippet to have a much larger Markdown score.
            if ($this->top->relevance > 0) {
                $this->relevance += $res->relevance;
            }
            if ($explicit) {
                $this->continuations[$this->top->subLanguage] = $res->top;
            }

            return $this->buildSpan($res->language, $res->value, false, true);
        } catch (\Exception $e) {
            error_log("TODO, is this a relevant catch?");
            error_log($e);

            return $this->escape($this->modeBuffer);
        }
    }

    private function processBuffer()
    {
        if (is_object($this->top) && $this->top->subLanguage) {
            $this->result .= $this->processSubLanguage();
        } else {
            $this->result .= $this->processKeywords();
        }

        $this->modeBuffer = '';
    }

    private function startNewMode($mode)
    {
        $this->result .= $mode->className ? $this->buildSpan($mode->className, "", true) : "";

        $t = clone $mode;
        $t->parent = $this->top;
        $this->top = $t;
    }

    private function processLexeme($buffer, $lexeme = null)
    {
        $this->modeBuffer .= $buffer;

        if ($lexeme === null) {
            $this->processBuffer();

            return 0;
        }

        $new_mode = $this->subMode($lexeme, $this->top);
        if ($new_mode) {
            if ($new_mode->skip) {
                $this->modeBuffer .= $lexeme;
            } else {
                if ($new_mode->excludeBegin) {
                    $this->modeBuffer .= $lexeme;
                }
                $this->processBuffer();
                if (!$new_mode->returnBegin && !$new_mode->excludeBegin) {
                    $this->modeBuffer = $lexeme;
                }
            }
            $this->startNewMode($new_mode, $lexeme);

            return $new_mode->returnBegin ? 0 : strlen($lexeme);
        }

        $end_mode = $this->endOfMode($this->top, $lexeme);
        if ($end_mode) {
            $origin = $this->top;
            if ($origin->skip) {
                $this->modeBuffer .= $lexeme;
            } else {
                if (!($origin->returnEnd || $origin->excludeEnd)) {
                    $this->modeBuffer .= $lexeme;
                }
                $this->processBuffer();
                if ($origin->excludeEnd) {
                    $this->modeBuffer = $lexeme;
                }
            }
            do {
                if ($this->top->className) {
                    $this->result .= self::SPAN_END_TAG;
                }
                if (!$this->top->skip && !$this->top->subLanguage) {
                    $this->relevance += $this->top->relevance;
                }
                $this->top = $this->top->parent;
            } while ($this->top != $end_mode->parent);
            if ($end_mode->starts) {
                if ($end_mode->endSameAsBegin) {
                    $end_mode->starts->endRe = $end_mode->endRe;
                }
                $this->startNewMode($end_mode->starts, "");
            }

            return $origin->returnEnd ? 0 : strlen($lexeme);
        }

        if ($this->isIllegal($lexeme, $this->top)) {
            $className = $this->top->className ? $this->top->className : "unnamed";
            $err = "Illegal lexeme \"{$lexeme}\" for mode \"{$className}\"";

            throw new \Exception($err);
        }

        // Parser should not reach this point as all types of lexemes should
        // be caught earlier, but if it does due to some bug make sure it
        // advances at least one character forward to prevent infinite looping.

        $this->modeBuffer .= $lexeme;
        $l = strlen($lexeme);

        return $l ? $l : 1;
    }

    /**
     * Replace tabs for something more usable.
     */
    private function replaceTabs($code)
    {
        if ($this->options['tabReplace'] !== null) {
            return str_replace("\t", $this->options['tabReplace'], $code);
        }

        return $code;
    }

    /**
     * Set the set of languages used for autodetection. When using
     * autodetection the code to highlight will be probed for every language
     * in this set. Limiting this set to only the languages you want to use
     * will greatly improve highlighting speed.
     *
     * @param array $set An array of language games to use for autodetection. This defaults
     *                   to a typical set Web development languages.
     */
    public function setAutodetectLanguages(array $set)
    {
        $this->autodetectSet = array_unique($set);
        self::registerLanguages();
    }

    /**
     * Get the tab replacement string.
     *
     * @return string The tab replacement string
     */
    public function getTabReplace()
    {
        return $this->options['tabReplace'];
    }

    /**
     * Set the tab replacement string. This defaults to NULL: no tabs
     * will be replaced.
     *
     * @param string $tabReplace The tab replacement string
     */
    public function setTabReplace($tabReplace)
    {
        $this->options['tabReplace'] = $tabReplace;
    }

    /**
     * Get the class prefix string.
     *
     * @return string
     *                The class prefix string
     */
    public function getClassPrefix()
    {
        return $this->options['classPrefix'];
    }

    /**
     * Set the class prefix string.
     *
     * @param string $classPrefix The class prefix string
     */
    public function setClassPrefix($classPrefix)
    {
        $this->options['classPrefix'] = $classPrefix;
    }

    /**
     * @throws \DomainException if the requested language was not in this
     *                          Highlighter's language set
     */
    private function getLanguage($name)
    {
        if (isset(self::$classMap[$name])) {
            return self::$classMap[$name];
        } elseif (isset(self::$aliases[$name]) && isset(self::$classMap[self::$aliases[$name]])) {
            return self::$classMap[self::$aliases[$name]];
        }

        throw new \DomainException("Unknown language: $name");
    }

    /**
     * Determine whether or not a language definition supports auto detection.
     *
     * @param string $name Language name
     *
     * @return bool
     */
    private function autoDetection($name)
    {
        return !$this->getLanguage($name)->disableAutodetect;
    }

    /**
     * Core highlighting function. Accepts a language name, or an alias, and a
     * string with the code to highlight. Returns an object with the following
     * properties:
     * - relevance (int)
     * - value (an HTML string with highlighting markup).
     *
     * @throws \DomainException if the requested language was not in this
     *                          Highlighter's language set
     * @throws \Exception       if an invalid regex was given in a language file
     */
    public function highlight($language, $code, $ignoreIllegals = true, $continuation = null)
    {
        $this->language = $this->getLanguage($language);
        $this->language->compile();
        $this->top = $continuation ? $continuation : $this->language->mode;
        $this->continuations = array();
        $this->result = "";

        for ($current = $this->top; $current != $this->language->mode; $current = $current->parent) {
            if ($current->className) {
                $this->result = $this->buildSpan($current->className, '', true) . $this->result;
            }
        }

        $this->modeBuffer = "";
        $this->relevance = 0;
        $this->ignoreIllegals = $ignoreIllegals;

        $res = new \stdClass();
        $res->relevance = 0;
        $res->value = "";
        $res->language = "";

        try {
            $match = null;
            $count = 0;
            $index = 0;

            while ($this->top && $this->top->terminators) {
                $test = preg_match($this->top->terminators, $code, $match, PREG_OFFSET_CAPTURE, $index);
                if ($test === false) {
                    throw new \Exception("Invalid regExp " . var_export($this->top->terminators, true));
                } elseif ($test === 0) {
                    break;
                }
                $count = $this->processLexeme(substr($code, $index, $match[0][1] - $index), $match[0][0]);
                $index = $match[0][1] + $count;
            }
            $this->processLexeme(substr($code, $index));

            for ($current = $this->top; isset($current->parent); $current = $current->parent) {
                if ($current->className) {
                    $this->result .= self::SPAN_END_TAG;
                }
            }

            $res->relevance = $this->relevance;
            $res->value = $this->replaceTabs($this->result);
            $res->language = $this->language->name;
            $res->top = $this->top;

            return $res;
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), "Illegal") !== false) {
                $res->value = $this->escape($code);

                return $res;
            }
            throw $e;
        }
    }

    /**
     * Highlight the given code by highlighting the given code with each
     * registered language and then finding the match with highest accuracy.
     *
     * @param string        $code
     * @param string[]|null $languageSubset When set to null, this method will
     *                                      attempt to highlight $code with each language (170+). Set this to
     *                                      an array of languages of your choice to limit the amount of languages
     *                                      to try.
     *
     * @throws \DomainException if the attempted language to check does not exist
     * @throws \Exception       if an invalid regex was given in a language file
     *
     * @return \stdClass
     */
    public function highlightAuto($code, $languageSubset = null)
    {
        $res = new \stdClass();
        $res->relevance = 0;
        $res->value = $this->escape($code);
        $res->language = "";
        $scnd = clone $res;

        $tmp = $languageSubset ? $languageSubset : $this->autodetectSet;

        foreach ($tmp as $l) {
            // don't fail if we run into a non-existent language
            try {
                // skip any languages that don't support auto detection
                if (!$this->autoDetection($l)) {
                    continue;
                }

                $current = $this->highlight($l, $code, false);
            } catch (\DomainException $e) {
                continue;
            }

            if ($current->relevance > $scnd->relevance) {
                $scnd = $current;
            }
            if ($current->relevance > $res->relevance) {
                $scnd = $res;
                $res = $current;
            }
        }

        if ($scnd->language) {
            $res->secondBest = $scnd;
        }

        return $res;
    }

    /**
     * Return a list of all supported languages. Using this list in
     * setAutodetectLanguages will turn on autodetection for all supported
     * languages.
     *
     * @param bool $include_aliases specify whether language aliases
     *                              should be included as well
     *
     * @return string[] An array of language names
     */
    public function listLanguages($include_aliases = false)
    {
        if ($include_aliases === true) {
            return array_merge(self::$languages, array_keys(self::$aliases));
        }

        return self::$languages;
    }

    /**
     * Returns list of all available aliases for given language name.
     *
     * @param string $language name or alias of language to look-up
     *
     * @throws \DomainException if the requested language was not in this
     *                          Highlighter's language set
     *
     * @return string[] An array of all aliases associated with the requested
     *                  language name language. Passed-in name is included as
     *                  well.
     */
    public function getAliasesForLanguage($language)
    {
        $language = self::getLanguage($language);

        if ($language->aliases === null) {
            return array($language->name);
        }

        return array_merge(array($language->name), $language->aliases);
    }
}

class Language
{
    public $disableAutodetect = false;
    public $caseInsensitive = false;
    public $aliases = null;

    public function complete(&$e)
    {
        if (!isset($e)) {
            $e = new \stdClass();
        }

        $patch = array(
            "begin" => true,
            "end" => true,
            "lexemes" => true,
            "illegal" => true,
        );

        $def = array(
            "begin" => "",
            "beginRe" => "",
            "beginKeywords" => "",
            "excludeBegin" => "",
            "returnBegin" => "",
            "end" => "",
            "endRe" => "",
            "endSameAsBegin" => "",
            "endsParent" => "",
            "endsWithParent" => "",
            "excludeEnd" => "",
            "returnEnd" => "",
            "starts" => "",
            "terminators" => "",
            "terminatorEnd" => "",
            "lexemes" => "",
            "lexemesRe" => "",
            "illegal" => "",
            "illegalRe" => "",
            "className" => "",
            "contains" => array(),
            "keywords" => null,
            "subLanguage" => null,
            "subLanguageMode" => "",
            "compiled" => false,
            "relevance" => 1,
            "skip" => false,
        );

        foreach ($patch as $k => $v) {
            if (isset($e->$k)) {
                $e->$k = str_replace("\\/", "/", $e->$k);
                $e->$k = str_replace("/", "\\/", $e->$k);
            }
        }

        foreach ($def as $k => $v) {
            if (!isset($e->$k) && is_object($e)) {
                $e->$k = $v;
            }
        }
    }

    public function __construct($lang, $filePath)
    {
        $json = file_get_contents($filePath);
        $this->mode = json_decode($json);

        $this->name = $lang;
        $this->aliases = isset($this->mode->aliases) ? $this->mode->aliases : null;

        $this->caseInsensitive = isset($this->mode->case_insensitive) ? $this->mode->case_insensitive : false;
        $this->disableAutodetect = isset($this->mode->disableAutodetect) ? $this->mode->disableAutodetect : false;
    }

    private function langRe($value, $global = false)
    {
        // PCRE allows us to change the definition of "new line." The
        // `(*ANYCRLF)` matches `\r`, `\n`, and `\r\n` for `$`
        //
        //   https://www.pcre.org/original/doc/html/pcrepattern.html

        return "/(*ANYCRLF){$value}/um" . ($this->caseInsensitive ? "i" : "");
    }

    private function processKeyWords($kw)
    {
        if (is_string($kw)) {
            if ($this->caseInsensitive) {
                $kw = mb_strtolower($kw, "UTF-8");
            }
            $kw = array("keyword" => explode(" ", $kw));
        } else {
            foreach ($kw as $cls => $vl) {
                if (!is_array($vl)) {
                    if ($this->caseInsensitive) {
                        $vl = mb_strtolower($vl, "UTF-8");
                    }
                    $kw->$cls = explode(" ", $vl);
                }
            }
        }

        return $kw;
    }

    private function inherit()
    {
        $result = new \stdClass();
        $objects = func_get_args();
        $parent = array_shift($objects);

        foreach ($parent as $key => $value) {
            $result->{$key} = $value;
        }

        foreach ($objects as $object) {
            foreach ($object as $key => $value) {
                $result->{$key} = $value;
            }
        }

        return $result;
    }

    private function expandMode($mode)
    {
        if (isset($mode->variants) && !isset($mode->cachedVariants)) {
            $mode->cachedVariants = array();

            foreach ($mode->variants as $variant) {
                $mode->cachedVariants[] = $this->inherit($mode, array('variants' => null), $variant);
            }
        }

        if (isset($mode->cachedVariants)) {
            return $mode->cachedVariants;
        }

        if (isset($mode->endsWithParent) && $mode->endsWithParent) {
            return array($this->inherit($mode));
        }

        return array($mode);
    }

    private function compileMode($mode, $parent = null)
    {
        if (isset($mode->compiled)) {
            return;
        }
        $this->complete($mode);
        $mode->compiled = true;

        $mode->keywords = $mode->keywords ? $mode->keywords : $mode->beginKeywords;

        /* Note: JsonRef method creates different references as those in the
         * original source files. Two modes may refer to the same keywords
         * set, so only testing if the mode has keywords is not enough: the
         * mode's keywords might be compiled already, so it is necessary
         * to do an 'is_array' check.
         */
        if ($mode->keywords && !is_array($mode->keywords)) {
            $compiledKeywords = array();

            $mode->lexemesRe = $this->langRe($mode->lexemes ? $mode->lexemes : "\w+", true);

            foreach ($this->processKeyWords($mode->keywords) as $clsNm => $dat) {
                if (!is_array($dat)) {
                    $dat = array($dat);
                }
                foreach ($dat as $kw) {
                    $pair = explode("|", $kw);
                    $compiledKeywords[$pair[0]] = array($clsNm, isset($pair[1]) ? intval($pair[1]) : 1);
                }
            }
            $mode->keywords = $compiledKeywords;
        }

        if ($parent) {
            if ($mode->beginKeywords) {
                $mode->begin = "\\b(" . implode("|", explode(" ", $mode->beginKeywords)) . ")\\b";
            }
            if (!$mode->begin) {
                $mode->begin = "\B|\b";
            }
            $mode->beginRe = $this->langRe($mode->begin);
            if ($mode->endSameAsBegin) {
                $mode->end = $mode->begin;
            }
            if (!$mode->end && !$mode->endsWithParent) {
                $mode->end = "\B|\b";
            }
            if ($mode->end) {
                $mode->endRe = $this->langRe($mode->end);
            }
            $mode->terminatorEnd = $mode->end;
            if ($mode->endsWithParent && $parent->terminatorEnd) {
                $mode->terminatorEnd .= ($mode->end ? "|" : "") . $parent->terminatorEnd;
            }
        }

        if ($mode->illegal) {
            $mode->illegalRe = $this->langRe($mode->illegal);
        }

        $expandedContains = array();
        foreach ($mode->contains as $c) {
            $expandedContains = array_merge($expandedContains, $this->expandMode(
                $c === 'self' ? $mode : $c
            ));
        }

        $mode->contains = $expandedContains;

        for ($i = 0; $i < count($mode->contains); ++$i) {
            $this->compileMode($mode->contains[$i], $mode);
        }

        if ($mode->starts) {
            $this->compileMode($mode->starts, $parent);
        }

        $terminators = array();

        for ($i = 0; $i < count($mode->contains); ++$i) {
            $terminators[] = $mode->contains[$i]->beginKeywords
                ? "\.?(" . $mode->contains[$i]->begin . ")\.?"
                : $mode->contains[$i]->begin;
        }
        if ($mode->terminatorEnd) {
            $terminators[] = $mode->terminatorEnd;
        }
        if ($mode->illegal) {
            $terminators[] = $mode->illegal;
        }
        $mode->terminators = count($terminators) ? $this->langRe(implode("|", $terminators), true) : null;
    }

    public function compile()
    {
        if (!isset($this->mode->compiled)) {
            $jr = new JsonRef();
            $this->mode = $jr->decode($this->mode);
            $this->compileMode($this->mode);
        }
    }
}

class JsonRef
{
    /**
     * Array to hold all data paths in the given JSON data.
     *
     * @var array
     */
    private $paths = null;

    /**
     * Recurse through the data tree and fill an array of paths that reference
     * the nodes in the decoded JSON data structure.
     *
     * @param mixed  $s Decoded JSON data (decoded with json_decode)
     * @param string $r The current path key (for example: '#children.0').
     */
    private function getPaths(&$s, $r = "#")
    {
        $this->paths[$r] = &$s;
        if (is_array($s) || is_object($s)) {
            foreach ($s as $k => &$v) {
                if ($k !== "\$ref") {
                    $this->getPaths($v, $r == "#" ? "#{$k}" : "{$r}.{$k}");
                }
            }
        }
    }

    /**
     * Recurse through the data tree and resolve all path references.
     *
     * @param mixed $s Decoded JSON data (decoded with json_decode)
     */
    private function resolvePathReferences(&$s, $limit = 20, $depth = 1)
    {
        if ($depth >= $limit) {
            return;
        }

        ++$depth;

        if (is_array($s) || is_object($s)) {
            foreach ($s as $k => &$v) {
                if ($k === "\$ref") {
                    $s = $this->paths[$v];
                } else {
                    $this->resolvePathReferences($v, $limit, $depth);
                }
            }
        }
    }

    /**
     * Decode JSON data that may contain path based references.
     *
     * @param string|object $json JSON data string or JSON data object
     *
     * @return mixed The decoded JSON data
     */
    public function decode($json)
    {
        // Clear the path array.
        $this->paths = array();
        // Decode the given JSON data if necessary.
        $x = is_string($json) ? json_decode($json) : $json;
        // Get all data paths.
        $this->getPaths($x);
        // Resolve all path references.
        $this->resolvePathReferences($x);
        // Return the data.
        return $x;
    }
}
