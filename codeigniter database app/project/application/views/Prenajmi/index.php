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
		<h1>List of Prenajmi</h1>
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
				<div class="panel-heading">Prenajmi <a href="<?php echo
					site_url('prenajmi/add/'); ?>" class="glyphicon glyphicon-plus pullright" ></a></div>
				<table class="table table-striped">
					<thead>
					<tr>
						<th width="10%">ID</th>
						<th width="25%">Sportovisko</th>
						<th width="25%">Zakaznik</th>
						<th width="15%">Termin</th>
						<th width="10%">Trvanie</th>
						<th width="15%">Action</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($prenajom)): foreach($prenajom
														  as $prenajom): ?>
						<tr>
							<td><?php echo '#'.$prenajom['idpren']; ?></td>
							<td><?php echo $prenajom['sportoviska_idsport']; ?></td>
							<td><?php echo $prenajom['zakaznici_idzak']; ?></td>
							<td><?php echo $prenajom['termin']; ?></td>
							<td><?php echo $prenajom['trvanie']; ?></td>
							<td>

								<a href="<?php echo
								site_url('prenajmi/view/'.$prenajom['idpren']); ?>" class="glyphicon
glyphicon-eye-open"></a>
								<a href="<?php echo
								site_url('prenajmi/edit/'.$prenajom['idpren']); ?>" class="glyphicon
glyphicon-edit"></a>
								<a href="<?php echo
								site_url('prenajmi/delete/'.$prenajom['idpren']); ?>" class="glyphicon
glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Prenajom(s) not
								found......</td></tr>
					<?php endif; ?>


					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
