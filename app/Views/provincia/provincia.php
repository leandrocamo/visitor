<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h4 class="mt-4"><?php echo $titulo ?></h4>

            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/provincia/nuevo" class="btn btn-info">Agregar</a>
                    <a href="<?php echo base_url(); ?>/provincia/eliminados" class="btn btn-warning">Eliminados</a>
                </p>
            </div>

            <div>
                <p>
                <h5 class="mt-4"><?php echo "Países" ?></h5>
                <select class="form-control" id="paisCombo" name="paisCombo">
                    <option value="0">Seleccionar Pais</option>
                    <?php foreach ($paises as $pais) {
                        if ($pais['id'] == 1)
                            $seleccionador = ' selected';
                        else
                            $seleccionador = '';
                        echo '<option value="' . $pais['id'] . '"' . $seleccionador . '>' . $pais['nombre'] . '</option>';
                    } ?>
                </select>

                </p>
            </div>



            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Siglas</th>
                            <th>País</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['id']; ?></td>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['siglas']; ?></td>
                                <?php foreach ($paises as $pais) {
                                    if ($dato['id_pais'] == $pais['id']) {
                                ?>
                                        <td><?php echo $pais['nombre']; ?></td>
                                <?php
                                    }
                                }
                                ?>
                                <td>
                                    <a href="<?php echo base_url() . '/provincia/editar/' . $dato['id']; ?>" class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="#" data-href="<?php echo base_url() . '/provincia/eliminar/' .
                                                                $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
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