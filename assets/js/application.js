$(document).ready(function(){
var temp_aid = window.location.pathname.split('/')
var aid = temp_aid[4];
var url2 = window.location.href; 

var path = window.location.pathname;
var seg = path.split('/');
var pathUrl = window.location.protocol + "//" + window.location.host + "/" + seg[1];

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
		
	}

  function getComments(){

  var base_url =  $("input[name = get-comment-url]").val();
   $.ajax({
    type: "post",
    url: pathUrl + "/blog/get_comments",
    dataType: "json",
    data:{
      aid: aid
    },
    success:function(data){
      $("#total-comment").text(data.length);
      $("#comment-section").html("");
      $.each(data, function(index, item){
        $("#comment-section").append("<div class='box-comment'>");
        $("#comment-section").append("<img class='img-circle img-sm margin-r-5' src='"+pathUrl+"/assets/uploads/"+item.image+"' alt='User Image'>");
        $("#comment-section").append("<div class='comment-text' id='comment-text'>");
        $("#comment-section").append("<span class='username' id='username'> ");
        $("#comment-section").append(item.firstname +" "+ item.lastname)
        $("#comment-section").append("<span class='text-muted pull-right' id='date'>"+moment(item.date,"YYYYMMDD h:mm:ss a").fromNow()+"</span>");
        $("#comment-section").append("</span>")
        $("#comment-section").append("<p>"+item.comment+"</p>");
        $("#comment-section").append("</div");
        $("#comment-section").append("</div");

      });

    },
    error: function(){
      console.log("error");
    }

  });
}
function getTotalComment(){
  
   $.ajax({
      type: "post",
      url: pathUrl + "/blog/get_comments",
      dataType: "json",
      data:{
        aid: aid
      },
      success:function(data){
        $("#total-comment").text(data.length);
      } 
    });  
}

  getTotalComment();
  getComments();
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
     
      $("input[name=comment]").val("");
      getComments();
    },
    error: function(){
      console.log("error");
    } 
  });
});

});