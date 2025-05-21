<?php
require_once "method.php";

$menu = new Menu();
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $menu->get_menu($id);
        } else {
            $menu->get_menu();
        }
        break;

    case 'POST':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $menu->update_menu($id);
        } else {
            $menu->insert_menu();
        }
        break;

    case 'DELETE':
        $id = intval($_GET["id"]);
        $menu->delete_menu($id);
        break;

    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
