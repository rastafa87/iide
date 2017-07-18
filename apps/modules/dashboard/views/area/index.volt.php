<ul class="breadcrumb">
    <li><a href="<?= $this->url->get('') ?>">Inicio</a></li>
    <li class="active">Areas de conocimeinto</li>
</ul>
<div class="page-title">
    <h2><a href="<?= $this->url->get('dashboard') ?>"><span class="fa fa-arrow-circle-o-left"></span></a> Menú principal</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Paises</h3>
                    <ul class="panel-controls">
                        <li><a href="<?= $this->url->get('dashboard/area/new') ?>"><span class="fa fa-plus"></span></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-actions">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Icono</th>
                                <th>Estatus</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($area as $values) { ?>
                            <tr id="<?= $values->getAreid() ?>">
                                <td><?= $values->getName() ?></td>
                                <td><?= $values->getIcon() ?></td>
                                <td><?= $values->getStatus() ?></td>
                                <td>
                                    <a href="<?= $this->url->get('dashboard/area/edit?areid=') ?><?= $values->getAreid() ?>" class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>