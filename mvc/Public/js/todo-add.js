
var form = $('form#todo');
var submitButton = form.find('button');

submitButton.on('click', function(e) {

	$.ajax({
		type : 'POST',
		url : 'todo/addAction',
		data : form.serialize(),
		success : function(response) {

			if (response.status == true)
				window.location.href = 'todo/listing';

		}
	});

});

