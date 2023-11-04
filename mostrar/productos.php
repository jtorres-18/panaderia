<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/x-icon" href="https://i.postimg.cc/nrGQ8SSX/logo.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap4/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="assets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/responsive.css">
	<link rel="stylesheet" href="assets/styles/loader.css">
	<title>panderia elohim </title>
</head>

<body>
	<div class="page-loading active">
		<div class="page-loading-inner">
			<div class="page-spinner"></div>
			<span>cargando...</span>
		</div>
	</div>
	<?php
	include('funciones/funciones_tienda.php');
	include('header.php');
	?>

	<div class="super_container">
		<div class="container mt-5 pt-5">
			<div class="row align-items-center">
				<div class="col-lg-12 text-center">
					<div class="section_title">
					<iframe src="https://giphy.com/embed/L9qgfflFitQARt1oMT" width="480" height="268" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/Everdale-baker-supercell-everdale-L9qgfflFitQARt1oMT"></a></p>
					</div>
				</div>
			</div>

			<div class="row align-items-center">
				<div class="col-lg-12 text-center mt-5">
					<div class="section_title">
						<h2>BIENVENIDOS A LA MEJOR PANADERIA</h2>
					</div>
				</div>
			</div>
			<?php
			$resultadoProductos = getProductData($con);
			?>

			<div class="row align-items-center">
				<?php
				while ($dataProduct = mysqli_fetch_array($resultadoProductos)) { ?>
					<div class="col-6 col-md-3 mt-5 text-center Products">
						<div class="card" style="max-height: 450px !important; min-height: 450px !important;">
							<div>
								<img class="card-img-top text-center mt-4" src="<?php echo $dataProduct["foto1"]; ?>" alt="<?php echo $dataProduct['nameProd']; ?>" style="max-width: 200px;">
							</div>
							<div class=" card-body text-center">
								<h5 class="card-title card_title"><?php echo $dataProduct['nameProd']; ?></h5>
								<?php
								$isEven = $dataProduct["prodId"] % 2 == 0;

								for ($i = 1; $i <= 5; $i++) {
									echo '<span><i class="bi bi-star-fill" style="padding: 0px 2px; color:' . ($isEven ? '#ffb90c' : ($i <= 3 ? '#ffb90c' : '')) . ';"></i></span>';
								}
								?>
								<hr>
								<p class="card-text p_puntos ">
									$ <?php echo number_format($dataProduct['precio'], 0, '', '.'); ?>
								</p>
							</div>
							<a href="detallesArticulo.php?idProd=<?php echo $dataProduct["prodId"]; ?>" class="red_button btn_puntos" title="Ver <?php echo $dataProduct['nameProd']; ?>">
								Ver Producto
								<i class="bi bi-arrow-right-circle"></i>
							</a>
						</div>
					</div>

				<?php } ?>
			</div>

		</div>

		<?php include('includes/footer.html'); ?>
	</div>
	<?php include('includes/js.html'); ?>

</body>

</html>