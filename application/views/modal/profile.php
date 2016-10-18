<div class="container">
	<section class="content-header">
		
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="box box-default">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" alt="User profile picture" id="profile-pic">
						<h3 name="profile-name" class="profile-username text-center"></h3>
						<p class="text-muted text-center">Web Developer</p>
							<?php if($this->session->userdata('logged_in')){?>
							<form method="POST" style="margin-left:38%;" class="form-inline" action="<?php echo base_url('login/uploadImage');?>" enctype="multipart/form-data">
								<div class="form-group">
									<!-- <input id="profile-pic" type="file" class="filestyle" data-buttonText="Change Profile" data-iconName="glyphicon glyphicon-inbox" data-input="false" name="userfile" required/> -->
									<input type="file" class="filestyle" data-input="false" name="userfile" data-buttonText="Change Profile">
								</div>
								<div class="form-group">	
								 	<button class="btn btn-primary" type="submit" name="action">Submit</button>
								</div>	
							</form>
							<?php }?>
						<hr>
						<h4 class="box-title">About me</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel justo at nunc maximus lobortis. Vestibulum vehicula ultricies leo, ac accumsan tortor faucibus id. Aliquam pulvinar lectus id odio dignissim, eu fermentum nisi blandit. Phasellus varius augue vitae risus vestibulum aliquet. Quisque vulputate, dolor ut vestibulum malesuada, erat dolor sagittis ante, a cursus ipsum ante rutrum lectus. Pellentesque sit amet mi mattis libero tincidunt viverra. Phasellus vel leo vitae ligula imperdiet mollis ac et lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras dui nisl, pretium sit amet pretium vulputate, aliquet quis tellus. Maecenas id elementum ipsum, quis imperdiet orci. Donec ipsum orci, ultricies vitae nulla rutrum, faucibus pulvinar elit. Nulla id justo fermentum, pellentesque sem eu, finibus sem. Ut risus erat, suscipit quis suscipit sit amet, mattis sit amet neque.

Mauris luctus arcu quis ipsum consequat laoreet. Mauris quam libero, consectetur sit amet turpis in, convallis cursus neque. Donec venenatis risus nec magna placerat, dapibus cursus lorem pharetra. Praesent posuere diam ac luctus cursus. Donec viverra at libero vitae ultricies. Nunc nec aliquet lorem. In et pretium lacus.

Aenean volutpat feugiat urna, eu viverra odio vulputate a. Nullam erat arcu, consequat sed auctor a, accumsan ullamcorper ligula. Suspendisse leo lacus, pretium vel luctus sed, dapibus eu dolor. Maecenas viverra facilisis odio id convallis. Sed vehicula convallis condimentum. Aliquam eget ornare ante. Vestibulum a bibendum magna. Fusce euismod nibh id felis finibus, eu ullamcorper lectus eleifend. Mauris eu augue enim. Cras vitae sem porta, accumsan leo a, egestas neque. Quisque et sodales ex. </p>
					</div>
				</div>
			</div>
		</div>	
	</section>
</div>












