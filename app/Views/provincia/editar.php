<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h4 class="mt-4"><?php echo $titulo ?></h4>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/provincia/actualizar" autocomplete="off">
                <input type="hidden" value="<?php echo $datos['id']; ?>" name="id" />
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nombre']; ?>" autofocus required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Siglas</label>
                            <input class="form-control" id="siglas" name="siglas" type="text" value="<?php echo $datos['siglas']; ?>" required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>País</label>
                            <select class="form-control" id="id_pais" name="id_pais">
                                <option value="">Seleccionar un país</option>
                                <?php foreach ($paises as $pais) {
                                    if ($pais['id'] == $datos['id_pais'])
                                        $seleccionador = 'selected';
                                    else
                                        $seleccionador = '';
                                    echo '<option value="' . $pais['id'] . '"' . $seleccionador . '>' . $pais['nombre'] . '</option>';
                                } ?>
                            </select>
                        </div>

                    </div>
                </div>
                <a href="<?php echo base_url(); ?>/provincia" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </main>