<?php
namespace Modules\Dashboard;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers the module auto-loader
     */
    public function registerAutoloaders(\Phalcon\DiInterface $dependencyInjector = NULL)
    {

        $loader = new Loader();

        $loader->registerNamespaces(array(
            'Modules\Dashboard\Controllers' => __DIR__ . '/controllers/',
            'Modules\Models' => __DIR__ . '/../../models/',
            'Modules\Models\Entities' => __DIR__ . '/../../models/entities/',
            'Modules\Models\Services' => __DIR__ . '/../../models/services/',
            'Modules\Models\Repositories' => __DIR__ . '/../../models/repositories/',
            'Modules\Dashboard\Plugins' => __DIR__ . '/plugins/',
        ));

        $loader->register();
    }

    public function registerServices(\Phalcon\DiInterface $di = NULL)
    {
        /**
         * Read configuration
         */
        $config = include dirname(dirname(dirname(__DIR__))) . "/apps/config/config.php";


        /**
         * Error 404
         */
        $di->set(
            'dispatcher',
            function() use ($di) {

                $evManager = $di->getShared('eventsManager');

                $evManager->attach(
                    "dispatch:beforeException",
                    function($event, $dispatcher, $exception)
                    {
                        if ($event->getType() == 'beforeNotFoundAction') {
                            $dispatcher->forward(array(
                                'module'=>'dashboard',
                                'controller' => 'error',
                                'action' => 'show404'
                            ));
                            return false;
                        }
                        if ($event->getType() == 'beforeException') {
                            switch ($exception->getCode()){
                                case \Phalcon\Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
                                case \Phalcon\Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
                                    $dispatcher->forward(array(
                                        'module'=>'dashboard',
                                        'controller' => 'error',
                                        'action' => 'show404'
                                    ));
                                    return false;
                            }
                        }
                    }
                );
                $dispatcher = new Dispatcher();
                $dispatcher->setEventsManager($evManager);
                $dispatcher->setDefaultNamespace('Modules\Dashboard\Controllers');
                return $dispatcher;
            },
            true
        );

        //Registering a dispatcher
        $di->set('dispatcher', function() use ($di){
            $dispatcher = new \Phalcon\Mvc\Dispatcher();
            $dispatcher->setDefaultNamespace("Modules\Dashboard\Controllers\\");
            $eventsManager = $di->getShared('eventsManager');
            $security = new Plugins\Security($di);

            $eventsManager->attach('dispatch', $security);
            $dispatcher->setEventsManager($eventsManager);

            return $dispatcher;
        });

        $di->set('view', function() use ($di) {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');

            $volt = new View\Engine\Volt($view, $di);
            $compiler = $volt->getCompiler();

            $compiler->addFunction('strtotime', 'strtotime');
            $view->registerEngines(array(
                ".volt" => $volt
            ));

            return $view;
        });



        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di['db'] = function () use ($config) {
            return new DbAdapter(array(
                "host" => $config->database->host,
                "username" => $config->database->username,
                "password" => $config->database->password,
                "dbname" => $config->database->dbname,
                'charset'   =>'utf8'
            ));
        };
    }

}
