<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/x-icon" href="https://i.postimg.cc/nrGQ8SSX/logo.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap4/bootstrap.min.css">
	<link rel="website icon" type="png" href="https://i.postimg.cc/nrGQ8SSX/logo.png">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/styles/estilos_productos.css" >
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/responsive.css">
	<link rel="stylesheet" href="assets/styles/loader.css">
	<title>Productos</title>
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
	?>
<main class="main-content">
	<div class="super_container">
	<header>
			<input type="checkbox" id="check">
			<label for="check" class="contenedorh">
				<i class="fas fa-bars" ></i>
			</label>
			<a  class="logo">
				<img src="https://i.postimg.cc/nrGQ8SSX/logo.png" alt="Logo Empresa">
			</a>
			<ul class="objetos">
				<li><a onclick="mostrar();" href="../index.html"><i id="carrito" class="fa-solid fa-home"></i></a></li>
				<li>
				<?php
                                        if (session_status() == PHP_SESSION_NONE) {
											session_start();
										}
                                        if(isset($_SESSION['entro']) && $_SESSION['entro']==true ){
                                    ?>        
                                        <a href="../sesion/cerrar.php" id="persona" ><i id="persona" class="material-icons">logout</i></a>    
<?php
                                                }else{
?>
                                                    <a href="../sesion/login.html" id="persona" ><i id="persona" class="fa-solid fa-user user-icon"></i></a>
                                                    <?php
                                                }
                                                
                                                    ?>
				</li>
				<li><a onclick="mostrar();" href="carrito.php"><i id="carrito" class="fa-solid fa-basket-shopping"><?php
									echo iconoCarrito($con);
									?></i></a></li>
				
			</ul>
			<div class="container-options">
				<a href="productos.php"><span>Todos</span></a>
				<a href="panaderia.php"><span>Panadería</span></a>
				<a href="reposteria.php"><span>Repostería</span></a>
			</div>
		</header>

		<div class="container mt-5 pt-5">
		<?php
			$resultadoProductos = getProductDataPanaderia($con);
			?>

			<div class="row align-items-center">
				<?php
				while ($dataProduct = mysqli_fetch_array($resultadoProductos)) { ?>
					<div class="col-6 col-md-3 mt-5 text-center Products">
						<div class="card" style="max-height: 450px !important; min-height: 450px !important; margin-bottom: 20px;">
							<div>
								<img class="card-img-top text-center mt-4" src="../dash_board/img/<?php echo $dataProduct["foto1"]; ?>" alt="<?php echo $dataProduct['nameProd']; ?>" style="max-width: 200px;">
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
		
		<footer class="footer newsletter">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="footer_nav_container">
							<div class="cr">
								© <span id="mirarelaño"></span> elohim
								<img src="https://i.postimg.cc/xTgbt7b7/favicon.png" alt="logo" />
								<script>
								function actualizarAnio() {
									const date = new Date();
									const currentYear = date.getFullYear();
									document.getElementById("mirarelaño").innerText = currentYear;
								}
								actualizarAnio();
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	</main>
		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
    var checkbox = document.getElementById('check');
    var menu = document.querySelector('.contenedorh');

    checkbox.addEventListener('change', function() {
        if (checkbox.checked) {
            // Muestra el menú, por ejemplo, cambiando la clase CSS
            menu.classList.add('mostrar-menu');
        } else {
            // Oculta el menú
            menu.classList.remove('mostrar-menu');
        }
    });
});

		</script>
	<?php include('includes/js.html'); ?>
</body>
</html>