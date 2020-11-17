<div class="container">
	<div class="row">
		<div class="panel panel-default">

			<div class="panel-heading">Sportovisko Details <a href="<?php
				echo site_url('sportoviska/'); ?>" class="glyphicon glyphicon-arrow-left
pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>Nazov:</label>
					<p><?php echo
						!empty($sportoviska['nazov'])?$sportoviska['nazov']
							:''; ?></p>
				</div>
				<div class="form-group">
					<label>Oznacenie:</label>
					<p><?php echo
						!empty($sportoviska['oznacenie'])?$sportoviska['oznacenie']:'';
						?></p>
				</div>

			</div>
		</div>
	</div>
</div>
