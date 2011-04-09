/***************************************************************************
 *   Copyright (C) 2011 by Alexey Denisov                                  *
 *   alexeydsov@gmail.com                                                  *
 ***************************************************************************/

var DialogController = DialogController || {};
DialogController.currentDialog = null;
DialogController.spawnByLink = function (link) {
	var self = this;
	$.ajax({
		url: $(link).attr('href'),
		type: 'GET',
		dataType: "html",
		cache: false,
		// Complete callback (responseText is used internally)
		complete: function(jqXHR, status, responseText) {
			// Store the response as specified by the jqXHR object
			responseText = jqXHR.responseText;
			// If successful, inject the HTML into all the matched elements
			if (jqXHR.isResolved()) {
				jqXHR.done(function(r) {
					responseText = r;
				});
				var dialog = self.markCurrent(self.spawn());
				dialog.html($("<div>").append(responseText));
				dialog.dialog("open");
			} else {
				//If not success - making window with error msg
				var dialog = self.markCurrent(self.spawn());
				dialog.html($("<div>").append("Loading page error..."));
				dialog.dialog('option', {dialogClass: 'ui-state-error', title: 'Error'});
				dialog.dialog('open');
			}
		}
	});
};

DialogController.markCurrent = function (dialog) {
	this.currentDialog = dialog;
	return dialog;
};

DialogController.spawn = function() {
	var dialogId = this.generateId();
	var html = "<div id=" + dialogId + "><!-- --></div>";
	$('body').append(html);
	var dialog = $('#' + dialogId).dialog({
		disabled: true,
		autoOpen: false
	});
	return dialog;
}

DialogController.generateId = function () {
	var min = 10000;
	var max = 99999;
	var time = Math.floor(new Date().getTime() / 1000);
	var rand = Math.floor(Math.random() * (max - min + 1)) + min;
	return "" + time + rand;
}