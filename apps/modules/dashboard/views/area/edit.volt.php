<ul class="breadcrumb">
    <li><a href="<?= $this->url->get('dashboard') ?>">Inicio</a></li>
    <li><a href="<?= $this->url->get('dashboard/area/index') ?>">Areas</a></li>
    <li class="active"><a href="#">Editar <?=$area->name;?></a></li>
</ul>
<div class="page-title">
    <h2><a href="<?= $this->url->get('dashboard/area') ?>"><span class="fa fa-arrow-circle-o-left"></span></a>  Salir</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-title">Editando <?=$area->name;?></h4>
            <div class="col-md-12 col-xs-12 panel-body form-group-separated">
                <form action="#" method="post" id="updateArea" name="updateArea" role="form" class="form-horizontal">
                    <span class="hide" id="key-security" data-key="<?php echo $this->security->getToken(); ?>"></span>
                    <span class="hide" id="value-security" data-value="<?php echo $this->security->getTokenKey(); ?>"></span>
                    <input type="hidden" value="<?=$area->areid;?>" name="areid"/>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Nombre</label>
                        <div class="col-md-8 col-xs-12">
                            <input id="name" type="text" class="form-control" placeholder="Nombre" name="name" value='<?=$area->name;?>' required/>
                            <i id="input-loader" class="fa fa-spinner fa-spin fade in hide"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Icono</label>
                        <div class="col-md-8 col-xs-12">
                            <input id="icon" type="text" class="form-control" placeholder="icono" name="icon" value='<?=$area->icon;?>' required/>
                            <i id="input-loader" class="fa fa-spinner fa-spin fade in hide"></i>
                            <p>Para seleccionar un icono porfavor buscar <a href="http://fontawesome.io/icons/" target="_blank">aquí</a></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Estatus</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <select id="status" name="status" class="form-control" required>
                                <option <?=$area->status=="ACTIVE"?"selected":""; ?> value="ACTIVE">ACTIVO</option>
                                <option <?=$area->status=="INACTIVE"?"selected":""; ?> value="INACTIVE">INACTIVO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <input type="submit" class="btn btn-success" value="Guardar"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- info -->
<div class="message-box message-box-info animated fadeIn" id="message-box-info">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"> Actualizando &nbsp; <i class="fa fa-circle-o-notch fa-spin style-fa"></i></div>
            <div class="mb-content">
                <p>Guardando y Actualizando su información, espere un momento por favor.</p>
            </div>
        </div>
    </div>
</div>
<!-- end info -->
<!-- success -->
<div class="message-box message-box-success animated fadeIn" id="message-box-success">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-check"></span> Información actualizada</div>
            <div class="mb-content">
                <p>Sus cambios han sido guardados correctamente</p>
            </div>
        </div>
    </div>
</div>
<!-- end success -->
<!-- warning -->
<div class="message-box message-box-warning animated fadeIn" id="message-box-warning">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-warning"></span> Error</div>
            <div class="mb-content">
                <p>Ha ocurrido un error al guardar su información, inténtelo nuevamente o regrese mas tarde.</p>
            </div>
            <div class="mb-footer">
                <button class="btn btn-default btn-lg pull-right mb-control-close">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- end danger -->
<div class="message-box message-box-danger animated fadeIn" id="message-box-danger">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> Cuidado</div>
            <div class="mb-content">
                <p>Usted no puede actualizar su imagen.</p>
            </div>
            <div class="mb-footer">
                <button class="btn btn-default btn-lg pull-right mb-control-close">Cerrar</button>
            </div>
        </div>
    </div>
</div>