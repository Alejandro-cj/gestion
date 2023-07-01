<?php include_once 'Views/template/header.php'; ?>

<div class="app-content">
    <?php include_once 'Views/components/menus.php'; ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description d-flex align-items-center">
                        <div class="page-description-content flex-grow-1">
                            <h1>File Manager</h1>
                        </div>
                        <div class="page-description-actions">
                            <a href="#" class="btn btn-primary" id="btnUpload"><i class="material-icons">add</i>Upload File</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data['carpetas'] as $carpeta) { ?>
                    <div class="col-md-4">
                        <div class="card file-manager-group">
                            <div class="card-body d-flex align-items-center">
                                <i class="material-icons" style="color: #<?php echo $carpeta['color']; ?>;">folder</i>
                                <div class="file-manager-group-info flex-fill">
                                    <a href="#" id="<?php echo $carpeta['id']; ?>" class="file-manager-group-title carpetas"><?php echo $carpeta['nombre']; ?></a>
                                    <span class="file-manager-group-about"><?php echo $carpeta['fecha']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="text-end">
                    <?php
                    $anterior = $data['pagina'] - 1;
                    $siguiente = $data['pagina'] + 1;
                    ?>
                    <div class="btn-group" role="group" aria-label="Button group">
                        <?php if ($data['pagina'] > 1) { ?>
                            <a class="btn btn-outline-primary" href="<?php echo BASE_URL . 'archivos/pagina/' . $anterior; ?>">Anterior</a>
                        <?php } if ($data['pagina'] < $data['total']) { ?>
                        <a class="btn btn-outline-primary" href="<?php echo BASE_URL . 'archivos/pagina/' . $siguiente; ?>">Siguiente</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'Views/components/modal.php';
include_once 'Views/template/footer.php';
?>