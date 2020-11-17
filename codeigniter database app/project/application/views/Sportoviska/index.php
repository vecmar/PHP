<div class="container">
	<?php if(!empty($success_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-success"><?php echo $success_msg;
				?></div>
		</div>
	<?php }elseif(!empty($error_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-danger"><?php echo $error_msg; ?></div>
		</div>
	<?php } ?>
	<div class="row">
		<h1>List of Sportoviska</h1>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="<?php
				echo base_url('index.php/prenajmi/'); ?>">Prenajmi</a> </li>

			<li><a href="<?php
				echo base_url('index.php/sportoviska/'); ?>">Sportoviska</a> </li>

			<li><a href="<?php
				echo base_url('index.php/zakaznici/'); ?>">Zakaznici</a> </li>
		</ul>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Sportoviska <a href="<?php echo
					site_url('sportoviska/add/'); ?>" class="glyphicon glyphicon-plus pullright" ></a></div>
				<table class="table table-striped">
					<thead>
					<tr>
						<th width="11%">ID</th>
						<th width="30%">Nazov</th>
						<th width="10%">Oznacenie</th>
						<th width="15%">Action</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($sportoviska)): foreach($sportoviska
															 as $sportoviska): ?>
						<tr>
							<td><?php echo '#'.$sportoviska['idsport']; ?></td>
							<td><?php echo
								$sportoviska['nazov']; ?></td>
							<td><?php echo $sportoviska['oznacenie'];
								?></td>
							<td>

								<a href="<?php echo
								site_url('sportoviska/view/'.$sportoviska['idsport']); ?>" class="glyphicon
glyphicon-eye-open"></a>
								<a href="<?php echo
								site_url('sportoviska/edit/'.$sportoviska['idsport']); ?>" class="glyphicon
glyphicon-edit"></a>
								<a href="<?php echo
								site_url('sportoviska/delete/'.$sportoviska['idsport']); ?>" class="glyphicon
glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Sportovisko(s) not
								found......</td></tr>
					<?php endif; ?>






					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>




