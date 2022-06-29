<?php

namespace App\Models;

require_once("Repository.php");

class Auteur extends Repository
{
    protected $nom,
              $prenom,
              $pays,
              $date_deces,
              $livres;


    function __construct($values = [])
    {
        parent::__construct();

        $this->nom = isset($values['nom']) ? $values['nom'] : null;
        $this->prenom = isset($values['prenom']) ? $values['prenom'] : null;
        $this->pays = isset($values['pays']) ? $values['pays'] : null;
        $this->date_deces = isset($values['date_deces']) ? $values['date_deces'] : null;
    }

    function nom()
    {
        return $this->nom;
    }

    function prenom()
    {
        return $this->prenom;
    }

    function pays()
    {
        return $this->pays;
    }

    function date_deces()
    {
        return date("d F Y à H:i", strtotime($this->date_deces));
    }

    function get($nom)
    {
        $query = 'SELECT * FROM livres, auteurs where auteur="'.ucfirst($nom).'" and livres.auteur = auteurs.nom';

        try {
            $statement = $this->db->prepare($query);
            $statement->execute();
            return new Auteur($statement->fetch());
        } catch (\PDOException $e) {
            echo "Statement failed: " . $e->getMessage();
            return false;
        }
    }
}
