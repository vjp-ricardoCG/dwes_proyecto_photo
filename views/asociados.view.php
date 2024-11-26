<?php include __DIR__.'/partials/inicio-documento.part.php' ?>


<?php include __DIR__ . '/partials/nav.part.php';
?>



<div id="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>Asociados</h1>
            <hr>
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>

                <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissibre" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>

                    <?php if (empty($errores)): ?>
                        <p><?= $mensaje ?></p>
                    <?php else : ?>
                        <ul>
                            <?php foreach ($errores as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>


                    <?php endif; ?>

                </div>
            <?php endif; ?>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">


            <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Nombre</label>
                        <input class="form-control" name="nombre"></input>
                        

                       

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Logo</label>
                        <input class="form-control-file" type="file" name="logo">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Descripción</label>
                        <textarea class="form-control" name="descripcion"></textarea>



                        <button class="pull-right btn btn-lg sr-button">ENVIAR</button>

                       

                    </div>
                </div>

                


            </form>
            <hr class="divider">
            <div class="imagenes_galeria">

                <!-- Tabla de imagenes  -->

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Asociado</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($imagenesLogos as $logos):?>
                        <tr>
                            <th scope="row"><?=$logos->getId()?></th>
                            <td><img src="<?=$logos->getUrlLogo()?>" alt="<?=$logos->getDescripcion()?>" title="<?=$logos->getDescripcion()?>" width="150px"></td>
                            
                            
                           
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<?php include __DIR__.'/partials/asociado.partial.php' ?>

<?php include __DIR__.'/partials/fin-documento.part.php' ?>