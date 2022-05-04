<?php

    class Film {

        // attributs ------------------------------------------------
        private $id_film;
        private $titre;
        private $synopsis;
        private $anneeProduction;
        private $realisateur;
        private $dateCreation;


        // constructeur via hydrate ---------------------------------
        public function hydrate(array $donnees) {
            foreach ($donnees as $key => $value) {
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }


        // getters --------------------------------------------------
        public function getId_film(){
            return $this->id_film;
        }

        public function getTitre(){
            return $this->titre;
        }

        public function getSynopsis(){
            return $this->synopsis;
        }

        public function getAnneeProduction(){
            return $this->anneeProduction;
        }

        public function getRealisateur(){
            return $this->realisateur;
        }
        
        public function getDateCreation(){
            return $this->dateCreation;
        }


        // setters --------------------------------------------------
        public function setId_film($id){
            $this->id_film = (int) $id;
        }

        public function setTitre($titre){
            $this->titre = $titre;
        }

        public function setSynopsis($synopsis){
            $this->synopsis = $synopsis;
        }

        public function setAnneeProduction($anneeProduction){
            $this->anneeProduction = (int) $anneeProduction;
        }
        public function setRealisateur($realisateur){
            $this->realisateur = $realisateur;
        }

        public function setDateCreation($dateCreation){
            $this->dateCreation = $dateCreation;
        }

    }


    class FilmManager {

        // attributs
        private $bdd;

        // à l'initialisation de mon manager je lui donne la connexion à la BdD  
        public function __construct(PDO $bdd) {
            $this->setBdd($bdd);
        }

        //getters
        //....

        //setters
        public function setBdd(PDO $bdd) {
            $this->bdd = $bdd;
        }

        // méthodes du Manager  
        // ---------------------------------------------------------------------
        
        public function getById($id) {
            // on s'assure que $id est bien un int
            $id = (int)$id;
            
            // on prépare la requête 
            $req = $this->bdd->prepare('SELECT * FROM film WHERE id_film = ?');
            // si elle fonctionne, on l'éxécute en y passant sous forme de tableau, les valeurs recherchées
            $req->execute(array($id));
            // PDO::FETCH_ASSOC retourne un tableau associatif indexé par le nom des champs
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            // je créé un nouvel objet Film 
            $film = new Film();
            // je le construis via la méthode hydrate
            $film->hydrate($donnees);
            // je retourne l'film 
            return $film;
        }

        public function getAll() {
            
            $films = [];
            $req = $this->bdd->query( 'SELECT * FROM film');
            
            while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
                $film = new Film();
                $film->hydrate($donnees);
                $films[] = $film;
            }
            return $films;
        }


        public function add(Film $film){
            // on utilise l'objet $bdd de PDO et on utilise sa méthode prepare
            // on donne un nom à chacun des champs qui vont varier ":titre"
            $req = $this->bdd->prepare(' INSERT INTO film(titre, synopsis, anneeProduction, realisateur, dateCreation) VALUES(:titre, :synopsis, :anneeProduction, :realisateur, :dateCreation) ');
            
            // pour chaque VALUES :titre, :synopsis, :anneeProduction, :realisateur, :dateCreation
            // je vais insérer la valeur respective en passant par chaque getter correspondant  
            // en respectant bien l'ordre des VALUES 
            // et on vérifie que le champ est du bon type
            $req->bindValue(':titre', $film->getTitre(), PDO::PARAM_STR);
            $req->bindValue(':synopsis', $film->getSynopsis(), PDO::PARAM_STR);
            $req->bindValue(':anneeProduction', $film->getAnneeProduction(), PDO::PARAM_INT);
            $req->bindValue(':realisateur', $film->getRealisateur(), PDO::PARAM_STR);
            $req->bindValue(':dateCreation', $film->getDateCreation(), PDO::PARAM_STR); // à voir s'il existe une constante format DATE
            $req->execute();
        }


        public function delete(Film $film) {
            $_id = $film->getId_film();
            $req = $this->bdd->prepare( 'DELETE FROM film WHERE id_film = ?');
            $req->execute(array($_id));
        }


        public function update(Film $film) {
            
            $req = $this->bdd->prepare( 'UPDATE film SET titre = :titre, synopsis = :synopsis, anneeProduction = :anneeProduction, realisateur = :realisateur, dateCreation = :dateCreation WHERE id_film = :id');
            
            $req->bindValue(':id', $film->getId_film(), PDO::PARAM_INT);
            $req->bindValue(':titre', $film->getTitre(), PDO::PARAM_STR);
            $req->bindValue(':synopsis', $film->getSynopsis(), PDO::PARAM_STR);
            $req->bindValue(':anneeProduction', $film->getAnneeProduction(), PDO::PARAM_INT);
            $req->bindValue(':realisateur', $film->getRealisateur(), PDO::PARAM_STR);
            $req->bindValue(':dateCreation', $film->getDateCreation(), PDO::PARAM_STR);

            $req->execute();
        }
    }
?> 