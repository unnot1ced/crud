<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'inc/config.inc.php';
require_once 'models/Attraction.php';
require_once 'controllers/AttractionController.php';

$database = new Database();
$db = $database->getConnection();

$controller = new AttractionController($db);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'detail':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $controller->detail($_GET['id']);
        } else {
            header("Location: index.php");
            exit;
        }
        break;

    case 'add':
        $controller->showAddForm();
        break;

    case 'create':
        $controller->add();
        break;

    case 'delete':
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $controller->delete($_GET['id']);
        } else {
            header("Location: index.php");
            exit;
        }
        break;

    case 'index':
    default:
        $controller->index();
        break;
}
