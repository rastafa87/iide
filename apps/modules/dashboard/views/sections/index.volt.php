<style>.select2-container{width: 100%!important;}.nav-tabs-vertical .tab-content{width: 100%;}</style><!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo $this->url->get('dashboard'); ?>">Inicio</a></li>
    <li><a href="#">Secciones</a></li>
    <li class="active"><?php echo ucfirst($category)?></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">
    <h2><a href="<?php echo $this->url->get('dashboard'); ?>"><span class="fa fa-arrow-circle-o-left"></span> Salir</a></h2>
</div>
<!-- END PAGE TITLE -->

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <h3 class="panel-title">Configuración sección <?php echo $category; ?></h3>
            </div>
            <span class="hide" id="key-security" data-key="<?php echo $this->security->getToken(); ?>"></span>
            <span class="hide" id="value-security" data-value="<?php echo $this->security->getTokenKey(); ?>"></span>
            <span class="hide" id="category" data-value="<?php echo $category; ?>"></span>
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#tab8" data-toggle="tab">Principal</a></li>
                    <li><a href="#tab9" data-toggle="tab">Slider</a></li>
                    <li><a href="#tab10" data-toggle="tab">Publicidad</a></li>
                </ul>
                <div class="panel-body tab-content">
                    <div class="tab-pane active" id="tab8">
                        <div class="col-md-6 col-xs-12 panel-body form-group-separated">
                            <form action="#" method="post" id="principalNewForm" name="principalNewForm" role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 col-xs-12 control-label">Noticia principal</label>
                                    <div class="col-md-8 col-xs-12">
                                        <select name="principalNew" id="ajax-post" class="form-control">
                                            <?php if ((empty(!$findNew))) { ?>
                                                <option value="<?php echo $findNew->getPid(); ?>" selected><?php echo $findNew->getTitle(); ?></option>
                                                <input type="hidden" name="pidLast" id="pidLast" value="<?php echo $findNew->getPid(); ?>"/>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-2">
                                            <input type="submit" class="btn btn-success" value="Guardar"/>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab9">
                        <div class="col-md-6 col-xs-12 panel-body form-group-separated">
                            <form action="#" method="post" id="SliderNewForm" name="SliderNewForm" role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-2 col-xs-12 control-label">Nota principal slider</label>
                                    <div class="col-md-8 col-xs-12">
                                        <select name="SliderNew[]" id="ajax-post-slider-1" class="form-control" data-order="1"/>
                                            <?php if ((empty(!$slider))) { ?>
                                                <option value="<?php echo $slider[1]['pid']; ?>" selected><?php echo $slider[1]['title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <label class="col-md-2 col-xs-12 control-label">Segunda nota slider</label>
                                    <div class="col-md-8 col-xs-12">
                                        <select name="SliderNew[]" id="ajax-post-slider-2" class="form-control" data-order="2"/>
                                            <?php if ((empty(!$slider))) { ?>
                                                <option value="<?php echo $slider[2]['pid']; ?>" selected><?php echo $slider[2]['title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-xs-12 control-label">Tercera nota slider</label>
                                    <div class="col-md-8 col-xs-12">
                                        <select name="SliderNew[]" id="ajax-post-slider-3" class="form-control" data-order="3"/>
                                            <?php if ((empty(!$slider))) { ?>
                                                <option value="<?php echo $slider[3]['pid']; ?>" selected><?php echo $slider[3]['title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-xs-12 control-label">Cuarta nota slider</label>
                                    <div class="col-md-8 col-xs-12">
                                        <select name="SliderNew[]" id="ajax-post-slider-4" class="form-control" data-order="4"/>
                                            <?php if ((empty(!$slider))) { ?>
                                                <option value="<?php echo $slider[4]['pid']; ?>" selected><?php echo $slider[4]['title']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php if ((empty(!$slider))) { ?>
                                            <input type="hidden"  name="pidLast[]" id="pdi1" value="<?php echo $slider[1]['pid']; ?>"/>
                                            <input type="hidden"  name="pidLast[]" id="pdi2" value="<?php echo $slider[2]['pid']; ?>"/>
                                            <input type="hidden"  name="pidLast[]" id="pdi3" value="<?php echo $slider[3]['pid']; ?>"/>
                                            <input type="hidden"  name="pidLast[]" id="pdi4" value="<?php echo $slider[4]['pid']; ?>"/>
                                        <?php } else { ?>
                                            <input type="hidden"  name="pidLast[]" id="pdi1"/>
                                            <input type="hidden"  name="pidLast[]" id="pdi2"/>
                                            <input type="hidden"  name="pidLast[]" id="pdi3"/>
                                            <input type="hidden"  name="pidLast[]" id="pdi4"/>
                                        <?php } ?>
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
                    <div class="tab-pane" id="tab10">
                        <h1>Proximamente</h1>
                    </div>
                </div>
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
                <p>Sus cambios han sido guardados correctamente.</p>
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