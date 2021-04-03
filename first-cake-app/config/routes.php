<?php
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true,
    ]));
    $routes->applyMiddleware('csrf');
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    
    $routes->fallbacks(DashedRoute::class);

    // 学習用
    $routes->connect('/posts', ['controller' => 'Posts', 'action' => 'index','index']);
    $routes->connect('/posts/:id',
     ['controller' => 'Posts', 'action' => 'view'],
     ['id' => '\d+','pass' => ['id']]
    );
    $routes->connect('/devs', ['controller' => 'Devs', 'action' => 'index','index']);
    $routes->connect('/devs-create', ['controller' => 'Devs', 'action' => 'create','index']);
    
    // 家計簿
    // $routes->connect('/kakeibo/index', ['controller' => 'TKeisans', 'action' => 'index','index']);
    // $routes->connect('/kakeibo/add/:id', 
    //     ['controller' => 'TKeisans', 'action' => 'add','add'],
    //     ['id' => '\d+','pass' => ['id']]
    // );
    // $routes->connect('/kakeibo/edit/:id', 
    //     ['controller' => 'TKeisans', 'action' => 'edit','edit'],
    //     ['id' => '\d+','pass' => ['id']]
    // );
    // $routes->connect('/kakeibo/view/:id',
    //  ['controller' => 'TKeisans', 'action' => 'view','view'],
    //  ['id' => '\d+','pass' => ['id']]
    // );
    // $routes->connect('/categories/index', ['controller' => 'Categories', 'action' => 'index','index']);
    // $routes->connect('/categories/edit/:id',
    //     ['controller' => 'Categories', 'action' => 'edit','edit'],
    //     ['id' => '\d+','pass' => ['id']]
    // );
    // $routes->connect('/categories/add', ['controller' => 'Categories', 'action' => 'edit']);
});

