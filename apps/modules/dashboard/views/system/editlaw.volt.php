<ul class="breadcrumb">
    <li><a href="<?= $this->url->get('dashboard') ?>">Inicio</a></li>
    <li><a href="<?= $this->url->get('dashboard/paises') ?>">Iberoamerica</a></li>
    <li><a href="<?= $this->url->get('dashboard/paises') ?>">Leyes de <?= $country->getCountry() ?></a></li>
    <li class="active"><a href="#">Editar <?= $law->getLaw() ?></a></li>
</ul>
<div class="page-title">
    <h2><a href="<?= $this->url->get('dashboard') ?>"><span class="fa fa-arrow-circle-o-left"></span></a>  Salir</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-title">Editando nota</h4>
            <div class="col-md-12 col-xs-12 panel-body form-group-separated">
                <form action="#" method="post" id="updateLaw" name="updateLaw" role="form" class="form-horizontal">
                    <input type="hidden" value="<?=$law->getLaid();?>" id="laid" name="laid">
                    <span class="hide" id="key-security" data-key="<?php echo $this->security->getToken(); ?>"></span>
                    <span class="hide" id="value-security" data-value="<?php echo $this->security->getTokenKey(); ?>"></span>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Nombre</label>
                        <div class="col-md-8 col-xs-12">
                            <?php $namelaw =  $law->getLaw();?>
                            <input id="note-title" type="text" class="form-control" placeholder="Nombre" name="name" value='<?= $namelaw ?>' required/>
                            <i id="input-loader" class="fa fa-spinner fa-spin fade in hide"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Itinerario(PDF)</label>
                        <div class="col-md-8 col-xs-12">
                            <div id="sendMailPersonal" class="dropzone-personalized dz-default dz-message">
                                <div class="dz-default dz-message">
                                    <div class="alert alert-info" style="cursor: pointer;width: 50%;float: left;">
                                        <i class="fa fa-files-o" style=""></i>&nbsp;Clic para subir archivo
                                        <input type="text" class="form-control hidden" value="<?=$law->getFile()?$law->getFile():'icon.png'?>" id="files" name="files">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <span>Máximo 1 archivo y no mayor a 450 MB</span>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Categoría</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <select id="cid" name="category" class="form-control" required>
                                <?php foreach ($category as $key => $sub):?>
                                    <option value="<?php echo $key+1?>" <?=$key==$law->getLaid()-1?"selected":""?>><?php $name=$sub->getNameCategoryLaw();?><?= $name ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">País</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <select id="cid" name="country" class="form-control" required>
                                <?php foreach ($countryall as $key2 => $con):?>
                                    <option value="<?php echo $key2+1?>" <?=$key2==$law->getCoid()-1?"selected":""?>><?php $name=$con->getCountry();?><?= $name ?></option>
                                <?php endforeach;?>
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