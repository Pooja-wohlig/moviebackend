<section class="panel">
    <header class="panel-heading">
        Movie Review Details
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editreviewsubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">User</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "user",$user,set_value( 'user',$before->user),"class='chzn-select form-control'");?>
                </div>
            </div>

<!--
            <div class="form-group" style="display:none;">
                <label class="col-sm-2 control-label" for="normal-field">user</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="user" value='<?php echo $userid;?>'>
                </div>
            </div>
-->
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Movie</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "movie",$movie,set_value( 'movie',$before->movie),"class='chzn-select form-control'");?>
                </div>
            </div>
           
<!--
             	<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Movie</label>
				  <div class="col-sm-4">
				<input type="text" id="normal-field" class="form-control" name="movie" value="<?php echo set_value('movie',$before->movie);?>">
				  </div>
-->
           
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Status</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "status",$status,set_value( 'status',$before->status),"class='chzn-select form-control'");?>
                </div>
            </div>
                	<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Review</label>
				  <div class="col-sm-4">
					<textarea rows="4" cols="50" id="normal-field" class="form-control" name="review" value="<?php echo set_value('review',$before->review);?>"></textarea>
				  </div>
				</div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewpage"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>
