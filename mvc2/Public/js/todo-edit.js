$('#navbarNav').find('.nav-item').removeClass('active').parent().find('#todo-listing').addClass('active');

var form = $('form#todo');
var submitButton = form.find('button');

submitButton.on('click', function(e) {

	$.ajax({
		type : 'POST',
		url : 'todo/editAction/',
		data : form.serialize(),
		success : function(response) {

			if (response.status == true)
				$('.alert').addClass('show');


		}
	});

});




