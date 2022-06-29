<?php

namespace App\Models;

require_once("Repository.php");

class Livre extends Repository
{
    protected $titre,
              $auteur,
              $resume,
              $prix,
              $date_parution,
              $genre,
              $edition,
              $langue,
              $isbn,
              $stock;


    function __construct($values = [])
    {
        parent::__construct();

        $this->titre = isset($values['titre']) ? $values['titre'] : null;
        $this->auteur = isset($values['auteur']) ? $values['auteur'] : null;
        $this->resume = isset($values['resume']) ? $values['resume'] : null;
        $this->prix = isset($values['prix']) ? $values['prix'] : null;
        $this->date_parution = isset($values['date_parution']) ? $values['date_parution'] : null;
        $this->genre = isset($values['genre']) ? $values['genre'] : null;
        $this->edition = isset($values['edition']) ? $values['edition'] : null;
        $this->langue = isset($values['langue']) ? $values['langue'] : null;
        $this->isbn = isset($values['isbn']) ? $values['isbn'] : null;
        $this->stock = isset($values['stock']) ? $values['stock'] : null;
    }

    function titre()
    {
        return $this->titre;
    }

    function auteur()
    {
        return $this->auteur;
    }

    function resume()
    {
        return $this->resume;
    }

    function prix()
    {
        return $this->prix;
    }

    function date_parution()
    {
        return date("d F Y à H:i", strtotime($this->date_parution));
    }

    function genre()
    {
        return $this->genre;
    }

    function edition()
    {
        return $this->edition;
    }

    function langue()
    {
        return $this->langue;
    }

    function isbn()
    {
        return $this->isbn;
    }

    function stock()
    {
        return $this->stock;
    }

    function get($isbn)
    {
        $query = 'SELECT * FROM livres where isbn="'.$isbn.'"';

        try {
            $statement = $this->db->prepare($query);
            $statement->execute();
            
             foreach($statement->fetchAll() as $livre) {
                $result = new Livre($livre);
             }
             return $result;
        } catch (\PDOException $e) {
            echo "Statement failed: " . $e->getMessage();
            return false;
        }
    }

    function all()
    {
        $query = 'SELECT * FROM livres';

        try {
            $statement = $this->db->prepare($query);
            $statement->execute();
            
            $result = [];
             foreach($statement->fetchAll() as $livre) {
                $result[] = new Livre($livre);
             }
             return $result;
        } catch (\PDOException $e) {
            echo "Statement failed: " . $e->getMessage();
            return false;
        }
    }
}
