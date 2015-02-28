console.log("hello");
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

		// If the search returns the result put them in a colorbox
		// Not using rel: 'gal' because then colorbox groups the hidden photos on the page as well
		$('#myResults').find('a').colorbox({
				'maxWidth' : '80%',
				'scalePhotos' : true,
				'opacity' : .60
			}).resize();
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
});

$('.thumbnail').find('a').colorbox({
	'rel' : 'gallery',
	'maxWidth' : '80%',
	'scalePhotos' : true,
	'opacity' : .60
}).resize();

// Submitting the Registration form using AJAX
$('#registerForm').on('submit', function(event) {
	event.preventDefault();

	console.log($('#submit'));
	var form = $('#registerForm'),
		firstName = $('#firstName').val(),
		lastName = $('#lastName').val(),
		phone = $('#phone').val(),
		email = $('#email').val(),
		username = $('#username').val(),
		password = $('#password').val(),
		confirmation = $('#confirmation').val();
	
	

	
	$.ajax({
		url: form.attr('action'),
		type: 'POST',
		data: {submit: true, first_name: firstName, last_name: lastName, phone: phone, email: email, username: username, password: password, confirmation: confirmation},
	})

	// Done submitting the data
	.done(function(data) {
		var content = $(data).find('#message');
		$('#message').html(content);
	})

	// Failure
	.fail(function(data) {
		var content = $(data).find('#message');
		$('#message').html(content);
	})
	.always(function() {
		console.log("complete");
	});	
		
});

