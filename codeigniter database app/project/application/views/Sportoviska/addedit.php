<div class="container">
	<div class="col-xs-12">
		<?php
		if(!empty($success_msg)){
			echo '<div class="alert alert-success">'.$success_msg.'</div>';
		}elseif(!empty($error_msg)){
			echo '<div class="alert alert-danger">'.$error_msg.'</div>';
		}
		?>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo $action; ?>
					Sportovisko <a href="<?php echo site_url('sportoviska/'); ?>"
								   class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">
						<div class="form-group">
							<label for="title">Nazov</label>
							<input type="text" class="form-control"
								   name="nazov" placeholder="Enter nazov" value="<?php echo
							!empty($post['nazov'])?$post['nazov']:''; ?>">
							<?php echo form_error('nazov','<p
class="help-block text-danger">','</p>'); ?>
						</div>
						<div class="form-group">
							<label for="title">Oznacenie</label>
							<input type="text" class="form-control"
								   name="oznacenie" placeholder="Enter oznacenie" value="<?php echo
							!empty($post['oznacenie'])?$post['oznacenie']:''; ?>">
							<?php echo form_error('oznacenie','<p
class="help-block text-danger">','</p>'); ?>
						</div>

						<input type="submit" name="postSubmit" class="btn
btn-primary" value="Submit"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
