<div class="container">
  <section class="content-header">

  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="box box-widget">
          <div class="box-header with-border">
            <div class="user-block">
              <img class="img-circle" src="<?php echo base_url()."assets/uploads/".$query->image?>" alt="User Image">
              <span class="username"><a href="#"> <?php echo $query->firstname ." ".$query->lastname?>   </a></span>
              <span class="description">Shared publicly - 7:30 PM - <?php echo date('F j Y ', strtotime($query->date_published)) ?></span>
            </div>
            <!-- /.user-block -->
            <div class="box-tools">
              <!-- <a class="btn btn-box-tool" href="<?php echo base_url()."blog/edit_page/".$query->aid?>"><i class="fa fa-pencil"></i> </a>-->
              <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i></button>

              <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#myModal2"><i class="fa fa-trash"></i></button>
             <!--  <a class="btn btn-box-tool" onclick="return confirm('Do you really want to delete it?');" href="<?php echo base_url()."blog/delete/".$query->aid?>"><i class="fa fa-trash"></i></a> -->
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <img class="img-responsive pad" src="<?php echo base_url()."assets/uploads/".$query->blog_image?>" alt="Photo">
            <h4><?php echo $query->title;?></h4>
            <p style="text-indent: 14px;"><?php echo nl2br($query->content) ?></p>
            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
            <span class="pull-right text-muted">127 likes - <text id="total-comment"></text> comments</span>
          </div>
          <!-- /.box-body -->
          <div id="comment-section" class="box-footer box-comments">
            
            <!-- /.box-comment -->
           
            <!-- /.box-comment -->
          </div>
          <!-- /.box-footer -->
          <div class="box-footer">
          <?php if($this->session->userdata('logged_in')){ ?>  
             <form action="" method="" id="post-comment">
                <img class="img-responsive img-circle img-sm" src="<?php echo base_url()."assets/uploads/".$this->session->userdata["logged_in"]["image"]?>" alt="Alt Text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input name="comment" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                  <input type="hidden" name="article-id" value="<?php echo $this->uri->segment(3)?>">
                  <input type="hidden" name="url" value="<?php echo base_url('blog/post_comment');?>">
                  <input type="hidden" name="get-comment-url" value="<?php echo base_url('blog/get_comments');?>">
                </div>
              </form>
            <?php } ?>  
          </div>
          <!-- /.box-footer -->
        </div>
      </div>
    </div>
  </section>
</div> 
<!-- Modal Update -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Blog</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('blog/update')?>
          <div class="form-group">
            <label>Title</label>
            <input type="hidden" name="aid" value="<?php echo $query->aid?>">
            <input  type="text" name="title" class="form-control" value="<?php echo $query->title?>">
          </div>
         <div class="form-group">   
            <label >Content</label>
            <textarea rows=10 cols=50 maxlength=5000 name="content" class="form-control" required>
              <?php echo $query->content?>
            </textarea>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">      
            <input type="Submit" name="_post" class="btn btn-success form-control" value="Update Blog">
            </div>
          </div>
        <?php echo form_close();?>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>     
<!-- Modal Delete -->
<div class="modal fade" id="myModal2" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">MyBlog</h4>
      </div>
      <div class="modal-body">
        <p> Do you really want to delete this blog?</p>
      <div class="modal-footer">
         <a class="btn btn-danger" onclick="return confirm('Do you really want to delete it?');" href="<?php echo base_url()."blog/delete/".$query->aid?>"><i class="fa fa-trash"></i>Delete</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>     










