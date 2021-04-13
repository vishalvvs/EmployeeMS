$(document).ready(function(){
	$("form").submit(function(){
		var id = true;
		$(':radio').each(function(){
			firstName = $(this).attr('firstName');
			if (id && !$(':radio[attend="' + attend + '"]:checked').length) {
				// alert(firstName + " ID Missing !");
				$('.alert').show();
				id = false;
			}
		});
		return id;
	});
});