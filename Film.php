<?php 

class Film {

    // attributs de la classe Film...
    private $id;
    public $titre;
    public $synopsis;
    public $anneeProduction;
    public $realisateur;
    public $jaquette;
    public $dateCreation;

    // modifie !
    // méthodes de la classe Film...

    // public function __construct() {}

    // public function watch() {
    //     echo "je regarde le film :".$title;
    // }
    public function hydrate(array $donnees) {

        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


}


?>