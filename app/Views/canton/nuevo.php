<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h4 class="mt-4"><?php echo $titulo ?></h4>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/canton/insertar" autocomplete="off">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>País</label>
                            <select class="form-control" id="id_pais" name="id_pais" autofocus>
                                <option value="0">Seleccionar Pais</option>
                                <?php foreach ($pais as $dato) {
                                    echo '<option value="' . $dato['id'] . '">' . $dato['nombre'] . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Provincia</label>
                            <select class="form-control" id="id_provincia" name="id_provincia" autofocus>
                                <option value="0">Seleccionar Provincia</option>
                                <?php foreach ($provincia as $dato) {
                                    echo '<option value="' . $dato['id'] . '">' . $dato['nombre'] . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo set_value('nombre'); ?>" autofocus required />
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Siglas</label>
                            <input class="form-control" id="siglas" name="siglas" type="text" value="<?php echo set_value('siglas'); ?>" required />
                        </div>

                    </div>
                </div>
                <a href="<?php echo base_url(); ?>/canton" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </main>