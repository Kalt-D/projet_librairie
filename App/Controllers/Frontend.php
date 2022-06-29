<?php

namespace App\Controllers;

Class Frontend {

    public $view;

    function __construct() {
        $this->view = new \App\Views\View();
    }

    function livres() {
        $livre = new \App\Models\Livre();
        $this->view->setData('livres', $livre->all());
        $this->view->setData('view', 'frontend/accueil');
        echo $this->view->render();
    }

    function livre() {
        $livre = new \App\Models\Livre();
        $this->view->setData('livre', $livre->get($_GET['id']));
        $this->view->setData('view', 'frontend/livre');
        echo $this->view->render();
    }

    function auteur() {
        $auteur = new \App\Models\Auteur();
        $this->view->setData('auteur', $auteur->get($_GET['nom']));
        $this->view->setData('view', 'frontend/auteur');
        echo $this->view->render();
    }
}