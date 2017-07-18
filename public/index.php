<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors',true);
//error_reporting(0);
error_reporting(E_ALL);

$di = new \Phalcon\DI\FactoryDefault();

$di->set('url', function(){
    $url = new \Phalcon\Mvc\Url();
    $url->setBaseUri("http://".$_SERVER["SERVER_NAME"]."/");
    return $url;
});

$di->set('router', function(){

    $router = new \Phalcon\Mvc\Router();
    $router->setDefaultModule("frontend");

    $router->add("/", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'index',
    ));
    $router->add('/sendcountry', array(
        'module'=>'frontend',
        'controller'=>'index',
        'action'=>'sendCountry',
    ));
    $router->add("/quienes-somos", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'quienessomos',
    ));
    $router->add("/revista", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'revista',
    ));
    $router->add("/ver-revista-digital", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'viewrevista',
    ));
    $router->add("/directorio", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'directorio',
    ));
    $router->add("/contactanos", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'contactanos',
    ));
    $router->add("/oples", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'oples',
    ));
    $router->add("/tribunales", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'tribunales',
    ));
    $router->add("/sistema-electoral-iberoamericano", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'system',
    ));

    /************   Noticias   ***********/
    $router->add('/([a-zA-Z\-]+)/([a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'category' => 1,
        'subcategory' => 2,
        'controller'=>'news',
        'action'=>'index'
    ))->setName("controllers")->convert('action', function($action) {
            return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
        });




    /*$router->add("/noticias", array(
        'module'=>'frontend',
        'controller' => 'news',
        'action' => 'index',
    ));
    $router->add("/noticias/iide-instituto-iberoamericano-de-derecho-electoral", array(
        'module'=>'frontend',
        'controller' => 'news',
        'action' => 'news1',
    ));*/
    $router->add('/([a-zA-Z\-]+)/([a-zA-Z\-]+)/([0-9-a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'category' => 1,
        'subcategory' => 2,
        'permalink'=>3,
        'controller'=>'news',
        'action'=>'news1'
    ))->setName("controllers")->convert('action', function($action) {
            return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
        });

    /* ***********   Investigadores   ********** */
    $router->add("/mtro-oswald-lara-borges", array(
        'module'=>'frontend',
        'controller' => 'investigators',
        'action' => 'profile1',
    ));
    $router->add("/dr-gustavo-ferrari-wolfenson", array(
        'module'=>'frontend',
        'controller' => 'investigators',
        'action' => 'gustavoFerrari',
    ));
    $router->add("/mtro-jose-luis-rodriguez-venegas", array(
        'module'=>'frontend',
        'controller' => 'investigators',
        'action' => 'joseLuis',
    ));
    $router->add("/lic-jesus-raciel-garcia-ramirez", array(
        'module'=>'frontend',
        'controller' => 'investigators',
        'action' => 'perfil2',
    ));
    $router->add("/lic-monica-patricia-mixteca-trejo", array(
        'module'=>'frontend',
        'controller' => 'investigators',
        'action' => 'monica',
    ));
    $router->add("/mtra-nuria-gabriela-hernandez-abarca", array(
        'module'=>'frontend',
        'controller' => 'investigators',
        'action' => 'nuria',
    ));
    $router->add("/lic-vladimir-zambrano-tapia", array(
        'module'=>'frontend',
        'controller' => 'investigators',
        'action' => 'vladimir',
    ));
    $router->add("/mtro-miguel-angel-vera-martinez", array(
        'module'=>'frontend',
        'controller' => 'investigators',
        'action' => 'miguelangel',
    ));
    $router->add("/investigadores", array(
        'module'=>'frontend',
        'controller' => 'investigators',
        'action' => 'index',
    ));
    /************   Investigadores   ***********/
    $router->add('/investigadores/([a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'investigador' => 1,
        'controller'=>'investigators',
        'action'=>'profile1'
    ))->setName("controllers")->convert('action', function($action) {
        return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });
    $router->add("/iberonautas", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'iberonautas',
    ));
    $router->add("/oferta-de-estudio", array(
        'module'=>'frontend',
        'controller' => 'academy',
        'action' => 'index',
    ));
    $router->add("/diplomado-en-derecho-electoral-derecho-procesal-electoral", array(
        'module'=>'frontend',
        'controller' => 'academy',
        'action' => 'derechoElectoral',
    ));
    $router->add("/diplomado-derechos-humanos", array(
        'module'=>'frontend',
        'controller' => 'academy',
        'action' => 'derechosHumano',
    ));
    $router->add("/diplomado-en-interpretacion-y-argumentacion-juridica", array(
        'module'=>'frontend',
        'controller' => 'academy',
        'action' => 'interpretacion',
    ));

    /************   Cursos   ***********/
    $router->add('/cursos/([a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'curso' => 1,
        'controller'=>'academy',
        'action'=>'cursos'
    ))->setName("controllers")->convert('action', function($action) {
        return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });
    
 /* Dashboard */
    $router->add("/dashboard", array(
        'module'=>'dashboard',
        'controller' => 'index',
        'action' => 'index',
    ));
    $router->add("/login", array(
        'module'=>'dashboard',
        'controller' => 'login',
        'action' => 'index',
    ));
    $router->add("/logout",array(
        'module'=>'dashboard',
        'controller' => 'login',
        'action' => 'logout',
    ));
    $router->add('/dashboard/([a-zA-Z\-]+)/([a-zA-Z\-]+)', array(
        'module'=>'dashboard',
        'controller' => 1,
        'action' => 2,
    ))->setName("controllers")->convert('action', function($action) {
            return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
        });
    $router->add("/dashboard/notes",array(
        'module'=>'dashboard',
        'controller' => 'notes',
        'action' => 'index',
    ));
    $router->add("/dashboard/investigador",array(
        'module'=>'dashboard',
        'controller' => 'investigador',
        'action' => 'index',
    ));
    /*$router->add("/dashboard/leyes",array(
        'module'=>'dashboard',
        'controller' => 'system',
        'action' => 'edit',
    ));*/
    $router->add("/dashboard/paises",array(
        'module'=>'dashboard',
        'controller' => 'system',
        'action' => 'index',
    ));
    $router->add("/dashboard/users",array(
        'module'=>'dashboard',
        'controller' => 'user',
        'action' => 'index',
    ));
    $router->add('/dashboard/users/edit/([0-9-a-zA-Z\-]+)',array(
        'module'=>'dashboard',
        'controller' => 'user',
        'action' => 'edit',
        'uid' => 1,
    ));
    $router->add("/dashboard/sections",array(
        'module'=>'dashboard',
        'controller' => 'sections',
        'action' => 'index',
    ));
    return $router;
});
/* *
 * Start the session the first time some component request the session service
 */
$di->set('dispatcher', function() use ($di){
    $dispatcher = new \Phalcon\Mvc\Dispatcher();
    $eventsManager = $di->getShared('eventsManager');
    $security = new Security($di);
    $security->setWorkFactor(50);
    $eventsManager->attach('dispatch', $security);
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});

$di->set('session', function () {
    $session = new Phalcon\Session\Adapter\Files();
    $session->start();
    return $session;
});
$di->set('collectionManager', function(){
    return new Phalcon\Mvc\Collection\Manager();
}, true);

$application = new \Phalcon\Mvc\Application();
$di->set('cookies', function () {
    $cookies = new Phalcon\Http\Response\Cookies();
    $cookies->useEncryption(false);
    return $cookies;
});
//Pass the DI to the application
$application->setDI($di);

//Register the installed modules
$application->registerModules(array(
            'frontend' => array(
                'className' => 'Modules\Frontend\Module',
                'path' =>'../apps/modules/frontend/Module.php'
            ),
            'dashboard' => array(
                'className' => 'Modules\Dashboard\Module',
                'path' =>'../apps/modules/dashboard/Module.php'
            )
        ));
echo $application->handle()->getContent();
