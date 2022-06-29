<?php

function autoload($class)
{
    //le nom de la class appellée avec le namespace est du type "Application\Models\Post". Avec la fonction substr on récupère la dernière partie du nom, après le \
    $class = substr($class, strrpos($class, '\\') + 1); 

    //on vérifie que le fichier existe et si oui on l'inclut
    if (is_file('App/Models/'.$class . '.php')) {
        require_once 'App/Models/'.$class . '.php';
    } 
    
    //on vérifie que le fichier existe et si oui on l'inclut
    if (is_file('App/Views/'.$class . '.php')) {
        require_once 'App/Views/'.$class . '.php';
    } 

    //on vérifie que le fichier existe et si oui on l'inclut
    if (is_file('App/Controllers/'.$class . '.php')) {
        require_once 'App/Controllers/'.$class . '.php';
    } 
}
spl_autoload_register('autoload'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on essaie d'instancier une classe non déclarée.
