<section class="panel">

    <div class="panel-body">
        <ul class="nav nav-stacked">
            <li><a href="<?php echo site_url('site/edituser?id=').$before->id; ?>">User Details</a></li>        
            <li><a href="<?php echo site_url('site/viewuserrate?id=').$before->id; ?>">Ratings</a></li>
            <li><a href="<?php echo site_url('site/viewwatch?id=').$before->id; ?>">Watched</a></li>
            <li><a href="<?php echo site_url('site/viewreview?id=').$before->id; ?>">Reviewed</a></li>
        </ul>
    </div>
</section>