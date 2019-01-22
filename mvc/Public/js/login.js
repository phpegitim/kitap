var form = $('form#login');
var submitButton = form.find('button');
submitButton.on('click', function(e) {

	$.ajax({
		type : 'POST',
		url : 'login/loginAction',
		data : form.serialize(),
		success : function(response) {
			//return false; // steği geliştirici konsolunda  inceledikten sonra bu komutu kaldıralım 
			if (response.status == false)
				$('.alert-danger').removeClass('fade');
			else
				window.location.href = "todo";
		}
	});

});

