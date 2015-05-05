<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				expertrating Details
			</header>
			<form form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createexpertratingsubmit");?>' enctype='multipart/form-data'>
			<table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Expert</th>
						<th>Rating</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					$i=0;
foreach($table as $row){ 
					?>
					<tr>
						<td><?php echo $row->id; ?></td>
						<td><?php echo $row->name;?><input type="hidden" name="expert[]" value="<?php echo $row->id; ?>"></td>
						<td><?php echo form_dropdown("rating[]",$rating,set_value('rating'));?></td>
					</tr>
					<?php 
$i++;
}?>
				</tbody>
			</table>
			<div class="row" style="padding:1% 0">
				<div class="col-md-12">
				 <button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
</form>
		</section>
	</div>
</div>