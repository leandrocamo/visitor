<div id="layoutSidenav_content">
    <main>
        <?php if (isset($validation)) { ?>
            <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
        <?php } ?>
        <div class="container-fluid px-4">
            <h1 class="mt-4"></h1>



            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-globe-europe"></i>
                    <?php echo $titulo; ?>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?php echo base_url(); ?>/pais/insertar" autocomplete="off">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo set_value('nombre'); ?>" placeholder="Enter your first name" autofocus required />
                                    <label for="nombre">Nombre</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" id="siglas" name="siglas" type="text" placeholder="Enter your last name" value="<?php echo set_value('nombre_corto'); ?>" required />
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
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger btn-ok">Aceptar</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>