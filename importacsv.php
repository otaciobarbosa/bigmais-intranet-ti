
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php include 'custom/header.php'; ?>
<body>
	<?php include 'custom/navigation.php'; ?>
	<div class="content-inner">
		<div class="card">
			<div class="card-body">
				<form  method="post" action="upload.php" enctype="multipart/form-data">
					<fieldset>
						<div class="row">
							<div class="col-md-4">
								<input type="text" class="form-control" id="campanha" name="campanha" placeholder="NOME DA CAMPANHA">
							</div>
							<div class="col-md-8">
								<input type="file" name="arquivo" />
								<button type="submit" value="Enviar" class="btn btn-success btn-sm">
									<i class="fa fa-upload" aria-hidden="true"></i>
									ENVIAR ARQUIVO
								</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
</section>
<?php include 'custom/footer.php'; ?>
</body>
</html>