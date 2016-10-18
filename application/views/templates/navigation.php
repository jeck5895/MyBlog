
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('blog/');?>">MyBlog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="<?php echo base_url('blog/main_page');?>">Home </a></li>
        <li><a href="#">Blogs</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" action="<?php echo base_url('blog/search')?>" method="POST">
        <div class="form-group">
          <input id="autocomplete" type="text" name="searchkey" class="form-control" placeholder="Search" onkeydown="searchparam()">
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
       
         <?php if($this->session->userdata('logged_in')){?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li><a href="<?php echo  base_url()."index.php/blog/add_form" ?>">Publish Article</a></li>
            <li><a href="<?php echo base_url('blog/mail_page')?>">Send Email</a></li>
            <li><a href="<?php echo base_url('login/profile_page')?>">My Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('login/logout');?>">Sign-out</a></li>
          </ul>
        </li>
        <?php } else{?>
           <a href="<?php echo base_url('login/');?>" class="btn btn-success navbar-btn navbar-left">Sign-in</a>    
        <?php }?>
         <li><a href="#"></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js');?>"></script>
<!-- <script type="text/javascript" scr="<?php echo base_url('assets/js/jquery.autocomplete.min.js')?>"></script> -->
<script type="text/javascript">
  
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

  function searchparam(){
    var url = 'http://localhost/MyBlog/blog/search';
    var key = $('input[name=searchkey]').val();
    
    $.ajax({
      type: "POST",
      url: url ,
      dataType: "json",
      data:{
        key : key
      },
      global: false,
      async: false,
      success: function (data) {
          console.log(data);
      },
      error: function(){
                       
      }
    });
  }

</script>