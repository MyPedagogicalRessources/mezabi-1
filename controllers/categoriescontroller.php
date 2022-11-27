<?php
namespace controllers;

use yasmf\HttpHelper;
use yasmf\View;
use services\ArticlesService;

class CategoriesController {

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

    /**
     * @param $pdo
     *  the pdo object used to connect to the database
     * @return View
     *  the view in charge of displaying the form to update the categorie
     */
    public function goEditCategorie($pdo) {
        $code = HttpHelper::getParam('code_categorie');
        $designation = HttpHelper::getParam('categorie');
        $view = new View("mezabi-1/views/edit_categorie");
        $view->setVar('code', $code);
        $view->setVar('designation', $designation);
        $view->setVar('message', null);
        $view->setVar('error', null);
        return $view;
    }

    /**
     * @param $pdo
     *  the pdo object used to connect to the database
     * @return View
     *  the view in charge of displaying the form to update the categorie
     */
    public function saveCategorie($pdo) {
        $code = HttpHelper::getParam('code_categorie');
        $designation = HttpHelper::getParam('categorie');
        $view = new View("mezabi-1/views/edit_categorie");
        $view->setVar('code', $code);
        $view->setVar('designation', $designation);
        $view->setVar('message', null);
        $view->setVar('error', null);
        try {
            $this->articlesService->updateCategorie($pdo,$designation, $code);
            $view->setVar('message', "Categorie modifiée !");
        } catch(\PDOException $ex) {
            $view->setVar('error', "Un problème est survenu.");
        }
        return $view;
    }

}


