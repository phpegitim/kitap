$('#navbarNav').find('.nav-item').removeClass('active').parent().find('#user-profile').addClass('active');

var form = $('form#profile');
var submitButton = form.find('button');

submitButton.on('click', function(e) {

	$.ajax({
		type : 'POST',
		url : 'user/profileAction',
		data : form.serialize(),
		success : function(response) {

			if (response.status == true)
				$('.alert-success').addClass('show');

		}
	});

});

