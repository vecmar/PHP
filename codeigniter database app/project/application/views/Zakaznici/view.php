<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Zakaznik Details <a href="<?php
				echo site_url('zakaznici/'); ?>" class="glyphicon glyphicon-arrow-left
pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>Meno:</label>
					<p><?php echo
						!empty($zakaznici['meno'])?$zakaznici['meno']
							:''; ?></p>
				</div>
				<div class="form-group">
					<label>Adresa:</label>
					<p><?php echo
						!empty($zakaznici['adresa'])?$zakaznici['adresa']:'';
						?></p>
				</div>

			</div>
		</div>
	</div>
</div>
