<?php

declare(strict_types = 1);


require __DIR__ .'/../vendor/autoload.php';
define('VIEWS_PATH',__DIR__.'/../Views');




$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();



// use App\{App,Router,View,Config,Container};
// use App\Controllers\{HomeController,GeneratorExample};
use App\PHP_8_1_Examples\Enum\{PaymentStatus,Payment};

// $container = new Container();
// $router = new Router($container);




// $router->get('/',[HomeController::class, 'index'])
//         ->get('/generator',[GeneratorExample::class,'index']);

// echo '<pre>';
// (new App(
//     $container,
//     $router,
//     [
//         'requestUri' => $_SERVER['REQUEST_URI'],
//         'requestMethod' => $_SERVER['REQUEST_METHOD'],
//     ],
//     new Config($_ENV)
// ))->run();

$payment = new Payment();
$payment->updateStatus(PaymentStatus::PAID);
 var_dump($payment->status()->text());
