$(document).ready(function() {
	$('#generate-names-submit').click(function() {
		$.ajax('/generate', {
			type: 'POST',
			data: $('#generate-names-form').serialize(),
			dataType: 'json',
			success: function(names) {
				var html = '';
				for (var i in names) {
					html += '<li>'+ names[i] +'</li>'
				}
				$('#generation-results ul').html(html);
			}
		});
	});
});