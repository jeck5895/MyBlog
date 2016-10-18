
<div class="container">
  <section class="content-header">
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="box box-default"> 
          <div class="box-header"><h3>Login to MyBlog</h3></div>
          <div class="box-body">
            <form class="col s12" method="POST" action="<?php echo base_url('login/auth');?>">
              <div class="form-group">
               <?php echo form_error('email','<div class="alert alert-danger text-center"> <button class="close" type="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>',"</div>");?>
                <label for="email" >Email</label>
                 <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <?php echo form_error('password','<div class="alert alert-danger text-center"> <button class="close" type="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>',"</div>");?>
                <label for="password" >Password</label>
                <input id="password5" type="password" name="password" class="form-control">
              </div>
              <div class="form-group">    
                <div class="col-md-6 col-md-offset-3">      
                  <input type="Submit" name="action" class="btn btn-success form-control" value="Login">
                </div>
              </div>
            </form>
          </div>
          <div class="box-footer">
             <label>Don't have an account? Register <a href="<?php echo base_url('login/register_page')?>">here</a></label>
          </div>
        </div>
      </div>
  </div>
 </section>
</div>   
       