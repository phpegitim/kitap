
$('button.btn-danger').on('click',function(e){
	var item = $(this).parents('tr');
	$.ajax({
		type : 'GET',
		url : 'todo/removeAction/'+item.data('id'),
		success : function(response) {
			if (response.status == true)
			
				item.fadeOut(2000,function(){
					$(this).remove();
				});

		}
	});	
});


