<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Prenajom Details <a href="<?php
				echo site_url('prenajmi/'); ?>" class="glyphicon glyphicon-arrow-left
pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>Sportovisko:</label>
					<p><?php echo
						!empty($prenajom['sportoviska_idsport'])?$prenajom['sportoviska_idsport']
							:''; ?></p>
				</div>
				<div class="form-group">
					<label>Zakaznik:</label>
					<p><?php echo
						!empty($prenajom['zakaznici_idzak'])?$prenajom['zakaznici_idzak']:'';
						?></p>
				</div>
				<div class="form-group">
					<label>Termin:</label>
					<p><?php echo
						!empty($prenajom['termin'])?$prenajom['termin']:'';
						?></p>
				</div>
				<div class="form-group">
					<label>Trvanie:</label>
					<p><?php echo
						!empty($prenajom['trvanie'])?$prenajom['trvanie']:'';
						?></p>
				</div>

			</div>
		</div>
	</div>
</div>
