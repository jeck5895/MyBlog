 <div class="container">
  <section class="content-header">
  </section>
 <section class="content">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">  
        <?php if(!empty($query) ){?>
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
            <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Maria Gonzales
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        Luna Stark
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <form action="#" method="post">
                <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <?php }} else { ?>
            <div class="box">
              <div class="box-body">
                  <h2 class="text-center">Search result is empty....</h2>
              </div>
            </div>
          <?php }?>
        </div>
    </div> 
  </section>
</div> 