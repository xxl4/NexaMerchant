$(function() {
    if (typeof cbUtilConfig !== 'object') {
        return;
    }
    if (cbUtilConfig.disable_non_english_char_input) {
    	$(document).on('keyup', 'input', function(){
    		$(this).val($(this).val().replace(/[^\x00-\x7F]/g, ''));
    	});
    	$(document).on('change', 'input', function(){
    		$(this).val($(this).val().replace(/[^\x00-\x7F]/g, ''));
    	});
    }
});