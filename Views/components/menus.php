<a href="#" class="content-menu-toggle btn btn-primary"><i class="material-icons">menu</i> content</a>
<div class="content-menu content-menu-right">
    <ul class="list-unstyled">
        <li><a href="<?php echo BASE_URL . 'archivos/pagina'; ?>" class="<?php echo ($data['active'] == 'todos') ? 'active' : ''; ?>">Todos</a></li>
        <li><a href="<?php echo BASE_URL . 'admin'; ?>" class="<?php echo ($data['active'] == 'recent') ? 'active' : ''; ?>">Recientes</a></li>
        <li><a href="<?php echo BASE_URL . 'archivos/recicle'; ?>" class="<?php echo ($data['active'] == 'deleted') ? 'active' : ''; ?>">Eliminados</a></li>
        <li class="divider"></li>
        <li><a href="#" class="<?php echo ($data['active'] == 'detail') ? 'active' : ''; ?>">Detalle</a></li>
    </ul>
</div>