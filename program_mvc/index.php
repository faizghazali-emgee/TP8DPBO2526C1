<?php
require_once 'config.php';
require_once 'controllers/AsetController.php';
require_once 'controllers/RuanganController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'aset';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if ($page == 'ruangan') {
    $controller = new RuanganController();
} else {
    $controller = new AsetController();
}

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->index();
        break;
}