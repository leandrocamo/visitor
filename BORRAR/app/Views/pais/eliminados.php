<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo ?></h4>
            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/pais" class="btn btn-warning">Países</a>
                </p>
            </div>

            <div class="card mb-4">
                <div class="card-body">

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Siglas</th>
                                <th>Acción</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><?php echo $dato['siglas']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url() . '/pais/reingresar/' . $dato['id']; ?>" data-toggle="modal" data-target="#modal-confirma" data-placement="top" title="Reingresar registro" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-up"></i></a>
                                        </a>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
