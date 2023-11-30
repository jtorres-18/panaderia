<header class="header trans_300">
	<div class="top_nav">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="top_nav_left text-right" style="line-height: 30px !important;">
						<i class="fa fa-user" aria-hidden="true"></i>
						<?php
                                        if (session_status() == PHP_SESSION_NONE) {
											session_start();
										}
                                        if(isset($_SESSION['entro']) && $_SESSION['entro']==true ){
                                    ?>        
                                        <a href="../sesion/cerrar.php" id="mi_cuenta">cerrar sesion</a>    
<?php
                                                }else{
?>
                                                    <a href="../sesion/login.html" id="mi_cuenta">iniciar sesion</a>
                                                    <?php
                                                }
                                                
                                                    ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main_nav_container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-right">
					<div class="logo_container">
						<a href="productos.php">
							<img src="https://i.postimg.cc/nrGQ8SSX/logo.png" class="mi_logo">
						</a>
					</div>
					<nav class="navbar">
						<ul class="navbar_menu">
							<li><a class="nav-link" href="../index.html">Inicio</a></li>
							<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Productos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="productos.php">Todos los productos</a>
                        <a class="dropdown-item" href="panaderia.php">Panadería</a>
                        <a class="dropdown-item" href="reposteria.php">Repostería</a>
                    </div>
                </li>
						</ul>
						<ul class="navbar_user">
							<li class="checkout">
								<a href="carrito.php">
									<img src="https://i.postimg.cc/nrGQ8SSX/logo.png" alt="carrito" style="width: 20px;">
									<?php
									echo iconoCarrito($con);
									?>
								</a>
							</li>
						</ul>
						<div class="hamburger_container">
							<i class="bi bi-list"></i>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>


<div class="fs_menu_overlay"></div>
<div class="hamburger_menu">
	<div class="hamburger_close"><i class="bi bi-x-lg"></i></div>
	<div class="hamburger_menu_content text-right">
	<ul class="menu_top_nav">
    <li class="menu_item has-children">
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['entro']) && $_SESSION['entro']==true ){
            ?>        
            <a href="../sesion/cerrar.php" id="mi_cuenta">Cerrar Sesión</a>    
            <?php
        } else {
            ?>
            <a href="../sesion/login.html" id="mi_cuenta">Iniciar Sesión</a>
            <?php
        }
        ?>
    </li>
    <li class="menu_item"><a href="../index.html">Inicio</a></li>
    <li class="menu_item"><a href="productos.php">Productos</a>
	<ul class="submenu">
            <li><a href="panaderia.php">Panadería</a></li>
            <li><a href="reposteria.php">Repostería</a></li>
        </ul>
</li>
</ul>

	</div>
</div>