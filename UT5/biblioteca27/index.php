<?php
//http://localhost/UT5MVC/biblioteca27/index.php?controller=usuario&action=listarUsuarios


$controlador = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'mostrarHome'; // Ver usuarios
$id = $_GET['id'] ?? null;

$controllerFile = 'controllers/' . ucfirst($controlador) . 'Controller.php';

if (file_exists($controllerFile)) { //se podría meter aquí también method_exists
    require_once $controllerFile;

    //$controller = new UsuarioController();
    $controllerClass = ucfirst($controlador) . 'Controller'; //UsuarioController
    $controller = new $controllerClass(); //new UsuarioController();

    // $controller->listarUsuarios();
    if(method_exists($controller, $action)){
        $controller->$action();
    }else{
        require_once('controllers/HomeController.php');
        $homeController = new HomeController();
        $homeController->mostrarHome();
    }
        
}else{
    require_once('controllers/HomeController.php');
    $homeController = new HomeController();
    $homeController->mostrarHome();
}







?>