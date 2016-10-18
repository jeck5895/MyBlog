<div class="container">
  <section class="content-header">
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="box box-default"> 
          <div class="box-header with-border"><h3>Register your Account</h3></div>
          <div class="box-body">
            <form class="col s12" method="POST" action="<?php echo base_url('login/register');?>">
              <div class="form-group">
                <label for="email" >Firstname</label>
                <input id="email4" type="text" name="firstname" class="form-control">
                
              </div>
              <div class="form-group">
                <label for="email" >Lastname</label> 
                <input id="email4" type="text" name="lastname" class="form-control">
               
              </div>
              <div class="form-group">
                <label for="email" >Email</label>
                <input id="email4" type="email" name="email" class="form-control">
                
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input id="password5" type="password" name="password" class="form-control">
                
              </div>
              <div class="form-group">
                <label for="password">Confirm Password</label>
                <input id="password5" type="password" name="confirm_password" class="form-control">
                
              </div>
              <div class="form-group">    
                <div class="col-md-6 col-md-offset-3">      
                <input type="Submit" name="action" class="btn btn-success form-control" value="Register">
                </div>
              </div>
            </form>
            
          </div>
          <div class="box-footer">
            <?php $get_error = validation_errors();
                if($get_error==true){
                  echo "<div class='alert alert-danger text-center'>";
                  echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times";
                  echo "</span></button>";
                  echo $get_error;
                  echo "</div>";
                  } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>          






