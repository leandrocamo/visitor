<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h4 class="mt-4"><?php echo $titulo ?></h4>

            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <a href="<?php echo base_url(); ?>/canton/nuevo" class="btn btn-info">Agregar</a>
                        <a href="<?php echo base_url(); ?>/canton/eliminados" class="btn btn-warning">Eliminados</a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label>País</label>
                        <select class="form-control" id="country" name="country" autofocus>
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
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Siglas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['id']; ?></td>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['siglas']; ?></td>

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

    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var country_id = $('#country').val();
                if (country_id != '') {
                    $.ajax({
                        url: '<?php echo base_url(); ?>/productos/buscarPorCodigo/' + codigo,
                        //"<?php echo base_url(); ?>dynamic_dependent/fetch_state",

                        method: "POST",
                        data: {
                            country_id: country_id
                        },
                        success: function(data) {
                            $('#state').html(data);
                            $('#city').html('<option value="">Select City</option>');
                        }
                    });
                } else {
                    $('#state').html('<option value="">Select State</option>');
                    $('#city').html('<option value="">Select City</option>');
                }
            });

            $('#state').change(function() {
                var state_id = $('#state').val();
                if (state_id != '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>dynamic_dependent/fetch_city",
                        method: "POST",
                        data: {
                            state_id: state_id
                        },
                        success: function(data) {
                            $('#city').html(data);
                        }
                    });
                } else {
                    $('#city').html('<option value="">Select City</option>');
                }
            });

        });
    </script>