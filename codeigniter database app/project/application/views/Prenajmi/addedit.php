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
					Prenajom <a href="<?php echo site_url('prenajmi/'); ?>"
								   class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">



						<div class="form-group">
							<?php echo form_label('Sportovisko'); ?>

							<?php
							$query = $this->db->query("SELECT idsport FROM sportoviska");
							?>

							<?php echo form_dropdown('sportovisko', $query->result_array(), '', 'class="form-control"');?>
							<?php echo
							!empty($post['sportovisko'])?$post['sportovisko']:''; ?>
						</div>


						<div class="form-group">
							<?php echo form_label('Zakaznici'); ?>

							<?php
							$query = $this->db->query("SELECT idzak FROM zakaznici");
							?>

							<?php echo form_dropdown('zakaznici', $query->result_array(), '', 'class="form-control"');?>
							<?php echo
							!empty($post['zakaznici'])?$post['zakaznici']:''; ?>
						</div>


						<div class="form-group">
							<label for="title">Termin</label>
							<input type="datetime-local" class="form-control"
								   name="termin" placeholder="Enter termin" value="<?php echo
							!empty($post['termin'])?$post['termin']:''; ?>">
							<?php echo form_error('termin','<p
class="help-block text-danger">','</p>'); ?>
						</div>

						<div class="form-group">
							<label for="title">Trvanie</label>
							<input type="number" class="form-control"
								   name="trvanie" placeholder="trvanie" value="<?php echo
							!empty($post['trvanie'])?$post['trvanie']:''; ?>">
							<?php echo form_error('trvanie','<p
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
