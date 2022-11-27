<?php
namespace controllers;

use services\ArticlesService;
use yasmf\HttpHelper;
use yasmf\View;

class ArticlesController {

    private $articlesService;

    /**
     * Create and initialize an ArticlesController object
     */
    public function __construct()
    {
        $this->articlesService = ArticlesService::getDefaultService();
    }

    /**
     * @param $pdo
     *  the pdo object used to connect to the database
     * @return View
     *  the view in charge of displaying the articles
     */
    public function index($pdo) {
        $codeCategorie = HttpHelper::getParam("code_categorie");
        $designationCategorie = HttpHelper::getParam("categorie");
        $searchStmt = $this->articlesService->findAllArticlesByCategorie($pdo, $codeCategorie);
        $view = new View("mezabi-1/views/all_articles");
        $view->setVar('searchStmt',$searchStmt);
        $view->setVar('categorie', $designationCategorie);
        return $view;
    }

}


