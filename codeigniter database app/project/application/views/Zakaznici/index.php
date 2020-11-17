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
		<h1>List of Zakaznici</h1>
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
				<div class="panel-heading">Zakaznici <a href="<?php echo
					site_url('zakaznici/add/'); ?>" class="glyphicon glyphicon-plus pullright" ></a></div>
				<table class="table table-striped">
					<thead>
					<tr>
						<th width="11%">ID</th>
						<th width="50%">Meno</th>
						<th width="50%">Adresa</th>
						<th width="15%">Action</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($zakaznici)): foreach($zakaznici
															 as $zakaznici): ?>
						<tr>
							<td><?php echo '#'.$zakaznici['idzak']; ?></td>
							<td><?php echo
								$zakaznici['meno']; ?></td>
							<td><?php echo $zakaznici['adresa'];
								?></td>
							<td>

								<a href="<?php echo
								site_url('zakaznici/view/'.$zakaznici['idzak']); ?>" class="glyphicon
glyphicon-eye-open"></a>
								<a href="<?php echo
								site_url('zakaznici/edit/'.$zakaznici['idzak']); ?>" class="glyphicon
glyphicon-edit"></a>
								<a href="<?php echo
								site_url('zakaznici/delete/'.$zakaznici['idzak']); ?>" class="glyphicon
glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Zakaznik(s) not
								found......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
