<div class="container">
  <section class="content-header">
    
  </section>
  <section class="content">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
		<div class="box box-default">	
			<div class="box-header"><h3>WELCOME TO MY BLOG</h3></div>
				<div class="box-body">
					<?php if(validation_errors()==TRUE){?>
					<div class="alert alert-warning alert-dismissible" role="alert">
			  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php echo validation_errors();?>
					</div>
					<?php }?>

				<?php echo form_open_multipart('blog/add_post')?>	
					<div class="form-group">
					
						<label>Title</label>
						<input type="text" name="title" class="form-control" required>
					
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="userfile" class="filestyle">
					</div>
					<div class="form-group">		
						<label >Content</label>
						<textarea rows=10 cols=50 maxlength=5000 name="content" class="form-control" required></textarea>
					</div>
					<div class="form-group">		
						<div class="col-md-6 col-md-offset-3">			
						<input type="Submit" name="add_post" class="btn btn-success form-control" value="Publish Blog">
						</div>
					</div>
				<?php echo form_close();?>
				<!-- </form> -->
					</div>
				</div>
			</div>	
		</div>	
	</section>
</div>	
	