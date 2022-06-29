<?php

echo 'Auteur : ' . $auteur->prenom() . ' ' . $auteur->nom();
foreach($auteur as $auteur) {
    echo $auteur->get($auteur->nom()) . '<br>';
}