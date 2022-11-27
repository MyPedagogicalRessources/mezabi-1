<?php
namespace controllers;

use yasmf\View;
use services\ArticlesService;

class HomeController {

    private $articlesService;

    /**
     * Create and initialize a HomeController object
     */
    public function __construct()
    {
        $this->articlesService = ArticlesService::getDefaultService();
    }

    /**
     * @param $pdo
     *  the pdo object used to connect to the database
     * @return View
     *  the view in charge of displaying the categories
     */
    public function index($pdo) {
        $searchStmt = $this->articlesService->findAllCategories($pdo);
        $view = new View("mezabi-1/views/all_categories");
        $view->setVar('searchStmt',$searchStmt);
        return $view;
    }

}


