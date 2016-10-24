<div class="container">
  <section class="content-header">
  </section>
  <section class="content">
      <div class="row">
        <div class="col-lg-8">  
        <?php foreach($query as $row){?>
        <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="<?php echo base_url()."assets/uploads/".$row->image?>" alt="User Image">
                <span class="username"><a href="<?php echo base_url()."blog/other_profile/".$row->author?>"> <?php echo $row->firstname ." ".$row->lastname?>   </a></span>
                <span class="description">Shared publicly - 7:30 PM - <?php echo date('F j Y ', strtotime($row->date_published)) ?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-responsive pad" src="<?php echo base_url()."assets/uploads/".$row->blog_image?>" alt="Photo">
              <h4><?php echo $row->title; ?></h4>
              <p style="text-indent: 14px;"><?php echo nl2br($row->content) ?>.....<br><em><a href="<?php echo base_url()."blog/view_page/".$row->aid?>">Read more</a></em></p>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
              <span class="pull-right text-muted">127 likes - 3 comments</span>
            </div>
            <!-- /.box-body -->
            <div id="comment-section" class="box-footer box-comments">
              <!-- <div class="box-comment" id="box-comment">
               
                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                <div class="comment-text" id="comment-text">
                      <span class="username" id="username">
                        Maria Gonzales
                        <span class="text-muted pull-right" id="date">8:03 PM Today</span>
                      </span>
                  <div id="display-comment">It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                  </div>
                </div>
               
              </div>
              
              <div class="box-comment">
                
                <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Luna Stark
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                
              </div> -->
              
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
            <?php if($this->session->userdata('logged_in') === TRUE){ ?>  
              <form action="" method="" id="post-comment">
                <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                
                <div class="img-push">
                  <input name="comment" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                  <input type="hidden" name="article-id" value="<?php echo $row->aid?>">
                  <input type="hidden" name="url" value="<?php echo base_url('blog/post_comment');?>">
                </div>
              </form>
           <?php }?>
            </div>
            <!-- /.box-footer -->
          </div>
          <?php } ?>
        
        </div>
        
        <div class="col-lg-4">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Advertisements</h4>  
            </div>
            <div class="box-body">
              <img style="margin: auto;" class="" width="300" height="" src="http://materializecss.com/images/sample-1.jpg">
              <hr>
              <p>Some paragraphs here</p>
            </div>
          </div> 
        </div> 
    </div> 
  </section>
</div> 