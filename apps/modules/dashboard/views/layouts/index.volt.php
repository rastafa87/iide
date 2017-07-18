<!DOCTYPE html>
<html lang="es-MX">
<head>
    <!-- META SECTION -->
    <?php $auth = $this->session->get("auth");?>
    <title>IIDE | Dashboard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--Meta Google-->
    <meta name="description" content="Administrador IIDE" />
    <meta name="keywords" content="IIDE" />
    <meta name="robots" content="nofollow">
    <meta name="googlebot" content="nofollow">
    <meta name="google" content="notranslate" />
    <meta name="author" content="Chontal Developers" />
    <meta name="copyright" content="2014 c-develpers.com Todos los derechos reservados." />
    <meta name="application-name" content="CMS IIDE" />
    <link rel="author" href="https://plus.google.com/u/0/101316577346995540804/posts"/>
    <link rel="canonical" href="http://www.IIDE.co/dashboard" />
    <!--Meta Facebook -->
    <meta property="og:title" content="IIDE | Dashboard"/>
    <meta property="og:type" content="web"/>
    <meta property="og:url" content="http://www.IIDE.co"/>
    <meta property="og:image" content="<?= $this->url->get('front/img/images/logoNew-floated.png') ?>">
    <meta property="og:site_name" content="http://c-developers.com/"/>
    <meta property="og:description" content="C-Developers crea Paginas web en Villahermosa Tabasco, desarrollo web en el Sureste de México y toda la republica mexicana ademas Marketing y SEO"/>
    <!--Twitter-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="C-Developers | Dashboard "/>
    <meta name="twitter:description" content="C-Developers crea Paginas web en Villahermosa Tabasco, desarrollo web en el Sureste de México y toda la republica mexicana ademas Marketing y SEO" />
    <meta name="twitter:image" content="<?= $this->url->get('front/img/images/logoNew-floated.png') ?>" />

    <!-- CSS INCLUDE -->
    
    <?= $this->assets->outputCss('CssIndex') ?>
    
    <link rel="stylesheet" href="<?= $this->url->get('dash/css/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" id="theme" href="/dash/css/theme-default.css"/>
    <link rel="stylesheet" type="text/css" id="theme" href="/dash/css/fontawesome/font-awesome.min.css"/>

    <!-- EOF CSS INCLUDE -->
</head>
<body>
<!-- PAGE LOADING FRAME -->
<div class="page-loading-frame">
    <div class="page-loading-loader">
        <img src="<?= $this->url->get('dash/img/loaders/page-loader.gif') ?>"/>
    </div>
</div>
<!-- END PAGE LOADING FRAME -->
  <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="<?= $this->url->get('dashboard') ?>">IIDE</a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <a href="<?= $this->url->get('dashboard/user/profile') ?>" class="profile-mini">
                        <img src="/dash/assets/images/users/thumbnail/<?= $auth['photo'] ?>" alt="Alexander"/>
                    </a>
                    <div class="profile">
                        <div class="profile-image">
                            <img src="/dash/assets/images/users/thumbnail/<?= $auth['photo'] ?>" alt="Alexander"/>
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name"><?= $auth['username'] ?></div>
                            <div class="profile-data-title"><?= $auth['cargo'] ?></div>
                        </div>
                        <div class="profile-controls">
                            <a href="<?= $this->url->get('dashboard/user/profile') ?>" class="profile-control-left" title="Editar perfil"><span class="fa fa-info"></span></a>
                            <a href="<?= $this->url->get('dashboard') ?>" class="profile-control-right" title="Mensajes de post"><span class="fa fa-envelope"></span></a>
                        </div>
                    </div>
                </li>
                <li class="xn-title">Navegación</li>
                <li class="<?php echo $this->router->getControllerName()=='index'?"active":""?>">
                    <a href="<?= $this->url->get('dashboard') ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Menú principal</span></a>
                </li>
                <li class="xn-openable <?= $this->router->getControllerName() && ($this->router->getActionName()=='newnote' || $this->router->getActionName()=='index')=='notes'?"active":""?>">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Notas</span></a>
                    <ul>
                        <li class="<?php echo $this->router->getActionName()=='newnote'?"active":""?>"><a href="<?= $this->url->get('dashboard/notes/new-note') ?>"><span class="fa fa-pencil"></span> Nueva nota</a></li>
                        <li class="<?php echo $this->router->getActionName()=='index'?"active":""?>"><a href="<?= $this->url->get('dashboard/notes') ?>"><span class="fa fa-file"></span> Todas las notas</a></li>
                        <!--li><a href="#"><span class="fa fa-file-text-o"></span> Borradores</a></li>
                        <li><a href="#"><span class="fa fa-warning"></span> Notas eliminadas</a></li-->
                    </ul>
                </li>
                <li class="xn-openable <?php echo $this->router->getControllerName()=='system'?"active":""?>">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Sistema Leyes</span></a>
                    <ul>
                        <li class="<?php echo $this->router->getActionName()=='index'?"active":""?>"><a href="<?= $this->url->get('dashboard/paises') ?>"><span class="fa fa-file"></span> Todo los paises</a></li>
                    </ul>
                </li>
                <li class="xn-openable <?php echo $this->router->getControllerName()=='investigador'?"active":""?>">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Investigadores</span></a>
                    <ul>
                        <li class="<?php echo $this->router->getActionName()=='new'?"active":""?>"><a href="<?= $this->url->get('dashboard/investigador/new') ?>"><span class="fa fa-pencil"></span> Nuevo investigador</a></li>
                        <li class="<?php echo $this->router->getActionName()=='index'?"active":""?>"><a href="<?= $this->url->get('dashboard/investigador') ?>"><span class="fa fa-file"></span> Todo los investigadores</a></li>
                    </ul>
                </li>
                <li class="xn-openable <?= $this->router->getControllerName()=='notes' && ($this->router->getActionName()=='conferencias'|| $this->router->getActionName()=='newcurso' || $this->router->getActionName()=='talleres'|| $this->router->getActionName()=='diplomados'|| $this->router->getActionName()=='foros'|| $this->router->getActionName()=='Seminarios')?"active":""?>">
                    <a href="#"><span class="fa fa-table"></span> <span class="xn-text">Cursos</span></a>
                    <ul>
                        <li><a href="<?= $this->url->get('dashboard/notes/new-curso') ?>"><span class="fa fa-align-justify"></span>Nuevo Curso</a></li>
                        <li><a href="<?= $this->url->get('dashboard/notes/conferencias') ?>"><span class="fa fa-align-justify"></span> Conferencias</a></li>
                        <li><a href="<?= $this->url->get('dashboard/notes/talleres') ?>"><span class="fa fa-align-justify"></span> Talleres</a></li>
                        <li><a href="<?= $this->url->get('dashboard/notes/diplomados') ?>"><span class="fa fa-align-justify"></span> Diplomados</a></li>
                        <li><a href="<?= $this->url->get('dashboard/notes/foros') ?>"><span class="fa fa-align-justify"></span> Foros</a></li>
                        <li><a href="<?= $this->url->get('dashboard/notes/seminarios') ?>"><span class="fa fa-align-justify"></span> Seminarios</a></li>
                    </ul>
                </li>
                <!--li class="xn-openable">
                    <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Configuraciones</span></a>
                    <ul>
                        <li><a href="#"><span class="fa fa-list-ul"></span>Categorías</a></li>
                        <li><a href="#"><span class="fa fa-tags"></span> Tags</a></li>
                        <li><a href="#"><span class="fa fa-heart"></span> Acerca de IIDE</a></li>
                        <li><a href="#"><span class="fa fa-pencil-square-o"></span> Misión y Visión</a></li>
                        <li><a href="#"><span class="fa fa-users"></span> Contáctanos</a></li>
                        <li><a href="#"><span class="fa fa-random"></span> Redes sociales</a></li>
                    </ul>
                </li-->
                <li class="xn-openable <?php echo $this->router->getControllerName()=='user'?"active":""?>">
                    <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Usuarios</span></a>
                    <ul>
                        <li class="<?php echo $this->router->getActionName()=='newuser'?"active":""?>">
                            <a href="<?= $this->url->get('dashboard/user/new-user') ?>"><span class="fa fa-user-plus"></span> Nuevo usuario</a>
                        </li>
                        <li>
                            <a href="<?= $this->url->get('dashboard/users') ?>"><span class="fa fa-user"></span> Activos</a>
                        </li>
                        <li>
                            <a href="<?= $this->url->get('dashboard/user/inactivos') ?>"><span class="fa fa-user-times"></span> Inactivos</a>
                        </li>
                    </ul>
                </li>
                <li class="xn-openable <?php echo $this->router->getControllerName()=='area'?"active":""?>">
                    <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Areas</span></a>
                    <ul>
                        <li class="<?php echo $this->router->getActionName()=='index'?"active":""?>">
                            <a href="<?= $this->url->get('dashboard/area/index') ?>"><span class="fa fa-user-plus"></span>Area</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
        <div class="page-content">
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <li class="xn-search">
                    <form role="form">
                        <input type="text" name="search" placeholder="Buscar"/>
                    </form>
                </li>
                <li class="xn-icon-button pull-right last">
                    <a href="#"><span class="fa fa-power-off"></span></a>
                    <ul class="xn-drop-left animated zoomIn">
                        <!--li><a href="<?= $this->url->get('') ?>"><span class="fa fa-lock"></span>Bloquear</a></li-->
                        <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span>Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
            <?= $this->getContent() ?>
        </div>
    </div>
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Cerrar <strong>Sesión</strong> ?</div>
                <div class="mb-content">
                    <p>¿Estas seguro de cerrar esta sesión?</p>
                    <p>Pulse No si desea continuar con el trabajo. Pulse Sí para cerrar la sesión del usuario actual.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="<?= $this->url->get('logout') ?>" class="btn btn-success btn-lg">Yes</a>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MESSAGE BOX-->
    
        <?= $this->assets->outputJs('JsIndex') ?>
    
    <script type="text/javascript" src="/dash/js/plugins.js"></script>
    <script type="text/javascript" src="/dash/js/actions.js"></script>
    <?php
        $plugins = $this->assets->collection('jsPlugins');
        if (!empty($plugins)) {echo $this->assets->outputJs('jsPlugins');}
    ?>
    <script type="text/javascript">
        $(function(){
            setTimeout(function(){
                pageLoadingFrame();
            },2000);
        });
        function delete_row(row){

            var box = $("#mb-remove-row");
            box.addClass("open");

            box.find(".mb-control-yes").on("click",function(){
                box.removeClass("open");
                $("#"+row).hide("slow",function(){
                    $(this).remove();
                });
            });
        }
    </script>
</body
</html>