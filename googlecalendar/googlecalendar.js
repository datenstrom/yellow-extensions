// Googlecalendar plugin, https://github.com/datenstrom/yellow-plugins/tree/master/googlecalendar
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

function GoogleCalender(element, options)
{
	this.element = element;
	this.options = options ? options : this.parseOptions(element,
		["mode", "timeZone", "dateMonths", "dateWeekdays", "dateFormatShort", "dateFormatMedium", "dateFormatLong",
		 "dateFormatTime", "timeMin", "entriesMax", "calendar", "apiKey"]);
	return (this instanceof GoogleCalender ? this : new GoogleCalender());
}

GoogleCalender.prototype =
{
	// Show calendar events
	onShowEvents: function(responseText, status)
	{
		var events = JSON.parse(responseText);
		if(events.items.length>0)
		{
			var ul = document.createElement("ul");
			ul.className = this.options.mode;
			for(var i=0; i<events.items.length; i++)
			{
				var item = events.items[i];
				var summary = item.summary;
				var description = item.description ? item.description : "";
				var format = item.start.date ? this.options.dateFormatMedium : this.options.dateFormatLong;
				var date = item.start.date ? item.start.date : item.start.dateTime;
				var location = item.location ? item.location : "";
				var li = document.createElement("li");
				li.innerHTML =
				"<span class=\"summary\">"+this.encodeHtml(summary)+"</span>"+
				(location ? ", <span class=\"location\">"+this.encodeHtml(location)+"</span>" : "")+
				" <span class=\"description\">"+this.encodeHtml(description)+"</span>"+
				" <span class=\"date\">"+this.encodeHtml(this.formatDate(format, new Date(date)))+"</span>";
				ul.appendChild(li);
			}
			this.element.appendChild(ul);
		}
	},

	// Show calendar agenda
	onShowAgenda: function(responseText, status)
	{
		var events = JSON.parse(responseText);
		if(events.items.length>0)
		{
			var section;
			var ul = document.createElement("ul");
			ul.className = this.options.mode;
			for(var i=0; i<events.items.length; i++)
			{
				var item = events.items[i];
				var summary = item.summary;
				var description = item.description ? item.description : "";
				var date = item.start.date ? item.start.date : item.start.dateTime;
				var time = item.start.dateTime ? item.start.dateTime : "";
				var location = item.location ? item.location : "";
				var sectionNew = this.formatDate(this.options.dateFormatMedium, new Date(date));
				if(section!=sectionNew)
				{
					section = sectionNew;
					var header = document.createElement("h2");
					header.className = this.options.mode;
					header.innerHTML = this.encodeHtml(section);
					this.element.appendChild(ul);
					this.element.appendChild(header);
					ul = document.createElement("ul");
					ul.className = this.options.mode;
				}
				var li = document.createElement("li");
				li.innerHTML =
				"<span class=\"time\">"+this.encodeHtml(time ? this.formatDate(this.options.dateFormatTime, new Date(time)) : "")+"</span>"+
				" <span class=\"summary\">"+this.encodeHtml(summary)+"</span>"+
				(location ? ", <span class=\"location\">"+this.encodeHtml(location)+"</span>" : "");
				ul.appendChild(li);
			}
			this.element.appendChild(ul);
		}
	},

	// Show calendar error
	onShowError: function(responseText, status)
	{
		var node = document.createTextNode("Calendar '"+this.options.calendar+"' not available!");
		this.element.appendChild(node);
	},
	
	// Request data
	request: function()
	{
		var url = "https://www.googleapis.com/calendar/v3/calendars/"+encodeURIComponent(this.options.calendar)+"/events?timeZone="+encodeURIComponent(this.options.timeZone)+"&timeMin="+encodeURIComponent(this.options.timeMin)+"&maxResults="+encodeURIComponent(this.options.entriesMax)+"&singleEvents=true&orderBy=startTime&fields=items(description%2Csummary%2Clocation%2Cstart)&key="+encodeURIComponent(this.options.apiKey);
		switch(this.options.mode)
		{
			case "events":	this.requestUrl(url, this.onShowEvents, this.onShowError); break;
			case "agenda":	this.requestUrl(url, this.onShowAgenda, this.onShowError); break;
		}
	},
	
	// Request URL with GET method
	requestUrl: function(url, callback, callbackError)
	{
		var thisObject = this;
		var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
		request.onreadystatechange = function() { if(this.readyState==4 && this.status==200) callback.call(thisObject, this.responseText, this.status); if(this.readyState==4 && this.status>=400) callbackError.call(thisObject, this.responseText,this.status); };
		request.open("GET", url, true);
		request.send();
	},
	
	// Parse calendar options
	parseOptions: function(element, keyNames)
	{
		var options = {};
		for(var i=0; i<element.attributes.length; i++)
		{
			var attribute = element.attributes[i], key, value;
			if(attribute.nodeName.substr(0, 5)=="data-")
			{
				key = attribute.nodeName.substr(5);
				for(var j=0; j<keyNames.length; j++)
				{
					if(key==keyNames[j].toLowerCase())
					{
						key = keyNames[j];
						break;
					}
				}
				switch(attribute.nodeValue)
				{
					case "true": value = true; break;
					case "false": value = false; break;
					default: value = attribute.nodeValue;
				}
				options[key] = value;
			}
		}
		return options;
	},

	// Format date
	formatDate: function(format, date)
	{
		var dateMonths = this.options.dateMonths.split(/,\s*/);
		var dateWeekdays = this.options.dateWeekdays.split(/,\s*/);
		var dateReplace =
		{
			d: function() { return (date.getDate()<10 ? "0" : "")+date.getDate(); },
			D: function() { return dateWeekdays[(date.getDay()+6)%7].substr(0, 3); },
			j: function() { return date.getDate(); },
			l: function() { return dateWeekdays[(date.getDay()+6)%7]; },
			N: function() { return (date.getDay()==0 ? 7 : date.getDay()); },
			w: function() { return date.getDay(); },
			F: function() { return dateMonths[date.getMonth()]; },
			m: function() { return (date.getMonth()<9 ? "0" : "")+(date.getMonth()+1); },
			M: function() { return dateMonths[date.getMonth()].substr(0, 3); },
			n: function() { return date.getMonth()+1; },
			Y: function() { return date.getFullYear(); },
			y: function() { return (""+date.getFullYear()).substr(2); },
			a: function() { return date.getHours()<12 ? "am" : "pm"; },
			A: function() { return date.getHours()<12 ? "AM" : "PM"; },
			g: function() { return date.getHours()%12 || 12; },
			G: function() { return date.getHours(); },
			h: function() { return ((date.getHours()%12 || 12)<10 ? "0" : "")+(date.getHours()%12 || 12); },
			H: function() { return (date.getHours()<10 ? "0" : "")+date.getHours(); },
			i: function() { return (date.getMinutes()<10 ? "0" : "")+date.getMinutes(); },
			s: function() { return (date.getSeconds()<10 ? "0" : "")+date.getSeconds(); },
		};
		return format.replace(/(.)/g, function(match) { return dateReplace[match] ? dateReplace[match].call() : match; });
	},
	
	// Encode HTML special characters
	encodeHtml: function(string)
	{
		return string
			.replace(/&/g, "&amp;")
			.replace(/</g, "&lt;")
			.replace(/>/g, "&gt;")
			.replace(/"/g, "&quot;");
	}
};

var initGoogleCalendarFromDOM = function()
{
	var calendars = {};
	var calendarElements = document.querySelectorAll(".googlecalendar");
	for(var i=0, l=calendarElements.length; i<l; i++)
	{
		calendars[i] = new GoogleCalender(calendarElements[i]);
		calendars[i].request();
	}
};

if(window.addEventListener) {
	window.addEventListener("load", initGoogleCalendarFromDOM, false);
} else {
	window.attachEvent("onload", initGoogleCalendarFromDOM);
}
