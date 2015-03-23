$(document).ready(function() {
	$('#search-box').keyup(function() {
	// Track any change of value in the search field and correspondingly submit the query

		var $form = $('#search-form'),
			term = $form.find("input[name='keyword']").val(),
			action = $form.attr('action');

		$.ajax({
			url: action,
			type: 'POST',
			data: {keyword: term},
		})
		.done(function(data) {
			var content = $(data).find('#myResults');

			if(term!="") {
				$('#display').hide();
			} else {
				$('#display').show();
			}
			$('#search-results').html(content);

		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			
		});
	});

	// Submitting the Registration form using AJAX
	$('#registerForm').submit(function(event) {
		event.preventDefault();
		submitForm($('#registerForm'));	
	});

	function submitForm(selector) {
		var formData = selector.serialize();
		console.log(formData);
		$.ajax({
			url: selector.attr('action'),
			type: 'POST',
			data: formData + "&submit=true"
		})
		.done(function(data) {
			var content = $(data).find('#message');
			$('#message').html(content);
		})
		.fail(function(data) {
			var content = $(data).find('#message');
			$('#message').html(content);
		})
	}

});
