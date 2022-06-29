<?php

namespace App\Views;

class View {

    protected $data;

    function render($template = 'template') {
        ob_start();
        if($this->data != null) extract($this->data);
        if(isset($template) and file_exists('App/Views/'.$template . '.php')) require "App/Views/".$template.".php";
        else die("La template $template n'existe pas, il faut vérifier l'appel à la fonction \$this->view->render dans le controller");
        $str = ob_get_contents();
        ob_end_clean();
        return $str;
    }

    function setData($key, $val) {
        $this->data[$key] = $val;
    }
}