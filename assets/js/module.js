
$(document).ready(function() {
	handleButton($('#et_save'),function() {
	});

	handleButton($('#et_cancel'),function(e) {
		if (m = window.location.href.match(/\/update\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/update/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	handleButton($('#et_deleteevent'));

	handleButton($('#et_canceldelete'));

	handleButton($('#et_print'),function(e) {
		printIFrameUrl(OE_print_url, null);
		enableButtons();
		e.preventDefault();
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});

	$('.specimenResultReceived').die('click').live('click',function(e) {
		e.preventDefault();

		var d = new Date;

		var h = withLeadingZero(d.getHours());
		var m = withLeadingZero(d.getMinutes());
		var s = withLeadingZero(d.getSeconds());

		$(this).closest('td').next('td').children('.resultsReceived').val(1);
		$(this).closest('td').next('td').children('.resultsReceivedTimestamp').val($.datepicker.formatDate('yy-mm-dd',d)+' '+h+':'+m+':'+s);
		$(this).closest('td').find('.specimenResultReceived').hide();
		$(this).closest('td').children('.specimenReceived').children('label').text($.datepicker.formatDate('d M yy',d)+' '+h+':'+m);
		$(this).closest('td').children('.specimenReceived').find('.unmarkReceived').show();
	});

	$('.unmarkReceived').die('click').live('click',function(e) {
		e.preventDefault();

		$(this).closest('td').next('td').children('.resultsReceived').val(0);
		$(this).closest('td').next('td').children('.resultsReceivedTimestamp').val('');
		$(this).closest('td').find('.specimenResultReceived').show();
		$(this).closest('td').children('.specimenReceived').children('label').text('Received');
		$(this).hide();
	});
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}

function withLeadingZero(value)
{
	value = value.toString();
	if (value.length <2) {
		return '0'+value;
	}
	return value;
}
