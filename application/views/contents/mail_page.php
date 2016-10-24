<div class="container">
  <section class="content-header">

  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
      <div class="box box-default">
        <div class="box-header"><h2 class="box-title">Compose Message</h2></div>
          <div class="box-body">
            <?php echo form_open_multipart('blog/send_email');?>
               <div class="form-group">
                <input class="form-control" name="to-email" type="email" placeholder="To:">
              </div>
              <div class="form-group">
                <input class="form-control" name="subject" type="text" placeholder="Subject:">
              </div>
              <div class="form-group">
                <label for="userfile" >Add Attachment</label>
                <input id="profile-pic" type="file" class="filestyle" data-buttonText="Attachment" data-iconName="fa fa-paperclip" data-input="false" name="userfile"/>
              </div>
              <div class="form-group">
                <label>Message</label>
                    <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">

                    </textarea>
              </div>

          </div>
          <div class="box-footer">
             <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
