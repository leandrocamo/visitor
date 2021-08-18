<div id="layoutSidenav_content">
    <main>
        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo ?></h4>

            <form method="POST" action="<?php echo base_url(); ?>/pais/actualizar" autocomplete="off">
                <input type="hidden" value="<?php echo $datos['id']; ?>" name="id" />
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nombre'];; ?>" placeholder="Enter your first name" autofocus required />
                            <label for="nombre">Nombre</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="siglas" name="siglas" type="text" placeholder="Enter your last name" value="<?php echo $datos['siglas']; ?>" required />
                            <label for="siglas">Siglas</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 mb-0">

                    <a href="<?php echo base_url(); ?>/pais" class="btn btn-primary">Regresar</a>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>


            </form>

        </div>
    </main>
