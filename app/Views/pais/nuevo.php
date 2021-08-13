            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?php echo $titulo ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>

                        <div class="card mb-4">
                            <!--
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                <?php echo $titulo ?>
                            </div>
        -->
                            <div class="card-body">
                                <div>
                                    <p>
                                        <a href="<?php echo base_url(); ?>/pais/nuevo" class="btn btn-info">Agregar</a>
                                        <a href="<?php echo base_url(); ?>/pais/eliminados" class="btn btn-warning">Eliminados</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </main>