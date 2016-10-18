function Insert(e){
	e.preventDefault();
	$('new-post-form').submit(function(e){
		e.preventDefault();
		var title = $('input[name = title]').val();
		var author = $('input[name = author]').val();
		var content = $('textarea[name = content]').val();
		var base_url = "<?php echo base_url()?>;";
		$.ajax({
			type:"POST",
			url: base_url+"index.php/blog/add_post",
			dataType: "JSON",
			data: {
				title: title,
				author: author,
				content: content
			},
			success: function(data){
				alert("success");
			}
		});
	});
}