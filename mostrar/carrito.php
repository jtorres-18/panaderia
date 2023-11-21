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
    <link rel="stylesheet" type="text/css" href="assets/styles/single_styles.css">
    <link rel="stylesheet" href="assets/styles/loader.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title> </title>
</head>

<body>
    <div class="page-loading active">
        <div class="page-loading-inner">
            <div class="page-spinner"></div>
            <span>cargando...</span>
        </div>
    </div>

    <div class="super_container  mt-5 pt-5">
        <?php
        include('modalEliminarProduct.php');
        include('funciones/funciones_tienda.php');
        include('header.php');
        ?>

        <div class="container mt-5 pt-5">
            <?php
            $miCarrito = mi_carrito_de_compra($con);
            if ($miCarrito && mysqli_num_rows($miCarrito) > 0) { ?>
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center mb-5" style="border-bottom: solid 1px #ebebeb;">
                            Resumen de mi Pedido
                        </h3>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead id="theadTableSpecial">
                                    <tr>
                                        <th scope="col"> </th>
                                        <th scope="col">Producto</th>
                                        <th scope="col" class="text-center">Cantidad</th>
                                        <th scope="col" class="text-right">Precio</th>
                                        <th class="text-right">Acción </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($dataMiProd = mysqli_fetch_array($miCarrito)) { ?>
                                        <tr id="resp<?php echo $dataMiProd['tempId']; ?>">
                                            <td>
                                                <img src="../dash_board/img/<?php echo $dataMiProd["foto1"]; ?>" alt="Foto_Producto" style="width: 50px;">
                                            </td>
                                            <td><?php echo $dataMiProd["nameProd"]; ?></td>
                                            <td>
                                                <div class="quantity_selector">
                                                    <span class="minus restarCant" id="<?php echo $dataMiProd["cantidad"]; ?>" onclick="disminuir_cantidad('<?php echo $dataMiProd['tempId']; ?>', '<?php echo $dataMiProd['precio']; ?>')">
                                                        <i class="bi bi-dash"></i>
                                                    </span>
                                                    <span id="display<?php echo $dataMiProd['tempId']; ?>">
                                                        <?php echo $dataMiProd["cantidad"]; ?>
                                                    </span>
                                                    <span id="<?php echo $dataMiProd["cantidad"]; ?>" class="plus aumentarCant" onclick="aumentar_cantidad('<?php echo $dataMiProd['tempId']; ?>','<?php echo $dataMiProd['precio']; ?>')">
                                                        <i class="bi bi-plus"></i>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-right"> <strong>$</strong>
                                                <?php echo number_format($dataMiProd['precio'], 0, '', '.'); ?>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#eliminarPrdoct" onclick="mostrarModal('<?php echo $dataMiProd['tempId']; ?>')">
                                                    <i class="bi bi-trash3"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                    <tr style="background-color: #fff !important;">
                                        <td colspan="4"></td>
                                        <td style="color:#fff; background-color: #ff4545 !important;">
                                            Total a Pagar:
                                            <span id="totalPuntos">
                                                $ <?php echo totalAcumuladoDeuda($con); ?>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col mb-2 mt-5">
                        <div class="row justify-content-md-center">
                            <div class="col-md-6 mb-4">
                                <a href="productos.php" class="btn btn-block btn_raza">
                                    <i class="bi bi-cart-plus"></i>
                                    Continuar Comprando
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" >finalizar pedido
                                <i class="bi bi-arrow-right-circle"></i>
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">detalles de la compra</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                        <div class="mb-3">
                                            <label for="direccion" class="col-form-label">direccion:</label>
                                            <input type="text" class="form-control" id="direccion">
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefono" class="col-form-label">telefono:</label>
                                            <input type="number" class="form-control" id="telefono">
                                        </div>
                                        <div class="mb-3">
                                            <label for="metodo_pago" class="col-form-label">metodos de pago:</label>
                                            <select class="form-select" aria-label="Default select example" id="metodo_pago">
                                            <option value="efectivo">efectivo</option>
                                            <option value="transferecia">transferencia</option>
                                            <option value="tarjeta">tarjeta</option>
                                            </select>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cerrar</button>
                                        <button type="button" onclick="finalizar_compra(event);" class="btn btn-success">finalizar</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-12">
                        <?php echo validando_carrito(); ?>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
    <?php include('includes/footer.html'); ?>
    </div>
    <?php include('includes/js.html'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="funciones/scrips_pedido.js"></script>
</body>


</html>