<?php
namespace controllers;

class HomeController {

    /**
     * @param $pdo
     *  the pdo object used to connect to the database
     */
    public function index($pdo) {
        $controller = new CategoriesController();
        return $controller->index($pdo);
    }

}


