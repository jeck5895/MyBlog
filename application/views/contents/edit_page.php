<!-- Modal -->
     



<div class="container">
	<div class="section">
		 <div class="col-lg-8 col-lg-offset-2">
        <div class="card-panel">
            <h4 class="header2">Welcome to MyBlog</h4>
            <div class="divider"></div>
            <div class="row">
              <form class="col s12" method="POST" action="<?php echo base_url('blog/update')?>">
                <div class="row">
                  <div class="input-field col s8 offset-s2">
                      <?php echo form_error('email','<div class="alert alert-danger text-center"> <button class="close" type="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>',"</div>");?>
                      <input type="hidden" name="aid" value="<?php echo $query->aid?>">
                      <input id="email4" type="text" name="title" class="validate" value="<?php echo $query->title?>">
                      
                   </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s8 offset-s2">
                       <?php echo form_error('password','<div class="alert alert-danger text-center"> <button class="close" type="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>',"</div>");?>
                      <input id="password5" type="text" name="author" class="validate" value="<?php echo $query->author?>">
                     
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s8 offset-s2">
                       <?php echo form_error('password','<div class="alert alert-danger text-center"> <button class="close" type="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times</span></button>',"</div>");?>
                      <textarea rows=10 cols=50 maxlength=5000 name="content" class="form-control" required>
                        <?php echo $query->content?>
                      </textarea>
                      
                    </div>
                  </div>
                    <div class="row">
                      <div class="input-field col s8 offset-s2">
                        <button class="btn cyan waves-effect waves-light form-control" type="submit" name="action">Submit
                        </button>
                      </div>
                      </div>
                      <div class="input-field col s12">
                          <!--  <?php $get_error = validation_errors();
                          if($get_error==true){
                          echo "<div class='alert alert-danger text-center'>";
                          echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times";
                          echo "</span></button>";
                          echo $get_error;
                          echo "</div>";
                          } ?> -->
                      </div>
                </form>
                 
              </div>
            </div>
           </div>
         </div>
      </div>
      
