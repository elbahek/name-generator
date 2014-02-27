$(document).ready(function() {
	$('.pretty-radios button').click(function() {
		$(this).siblings().removeClass('active');
		$(this).addClass('active');

		if ($(this).parent().prev().children('.radio').length === 0) {
			return false;
		}

		$(this).parent().prev().find('input[type="radio"]').prop('checked', false);
		$(this).parent().prev().find('input[type="radio"][value="'+ $(this).attr('data-checkbox-value') +'"]').prop('checked', true);
	});
});