$(document).ready(function(){

var url2 = window.location.href; 
 
$('ul a[href="'+ url2 +'"]').parent().addClass('active');
	console.log(url2);
var title = window.location.pathname.split("/");
  var title2 = title[3].toString();  
  var feature = "";
  for (i = 0; i < title2.length; i++) {
    feature += title2[i] + "";
  }
  var param = feature.split('_')
  var param2 = param[1].toString();
  document.title = "MyBlog" + " | " + feature[0].toUpperCase() + param[0].slice(1) + " " + param2[0].toUpperCase() + param2.slice(1);   
	
	

	function getJSONDoc(url) {
        var response = $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            global: false,
            async: false,
            success: function (data) {
                return data;
            }
        }).responseText;
        return $.parseJSON(response);
    }

	function load_profile_image(){
		
		var param = window.location.href.split('/');
		var url = param[0] + "/" + param[1] + "/" + param[2] + "/" + param[3] + "/";
		var image = getJSONDoc(url + 'login/load_profile_image');
		
		$.each(image , function(index, item){
			$("#profile-pic").attr('src',url+'assets/uploads/'+item.image);
			$("h3").html(item.firstname + " " + item.lastname);
			$("p").text(item.email);
		});
		console.log(image);
	}
	load_profile_image();

$("#post-comment").submit(function(e){
  e.preventDefault();
  var comment = $('input[name = comment]').val();
  var aid = $("input[name = article-id]").val();
  var base_url =  $("input[name = url]").val();
  console.log(comment +" "+ aid);
  $.ajax({
    type: "POST",
    url: base_url,
    dataType: "json",
    data:{
      comment: comment,
      aid: aid
    },
    success: function(data){
      $("#comment-section").html("");
      $.each(data, function(index, item){
        $("#comment-section").append("<div class='box-comment'>");
        $("#comment-section").append("<img class='img-circle img-sm' src='../dist/img/user3-128x128.jpg' alt='User Image'>");
        $("#comment-section").append("<div class='comment-text' id='comment-text'>");
        $("#comment-section").append("<span class='username' id='username'>Juan");
        $("#comment-section").append("<span class='text-muted pull-right' id='date'>8:03 PM Today</span>");
        $("#comment-section").append("</span>")
         $("#comment-section").append("<div>"+item.comment+"</div>");
        $("#comment-section").append("</div");
        $("#comment-section").append("</div");
      });
    },
    error: function(){
      console.log("error");
    } 
  });
});

function loadcomments(){

}

});