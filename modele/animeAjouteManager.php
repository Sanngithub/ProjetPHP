<?php

    require '../modele/animeAjouteClass.php';

    class AnimeAjouteManager {


        private $bdd;

        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }

        public function __construct(PDO $bdd){
            $this->setDb($bdd);
        }


        // Functions CRUD
        
        public function getAll() {
            
            $listeAnimesAjoutes = [];
            $req = $this->bdd->query( 'SELECT * FROM animes_ajoutes');
            
            while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
              
                $animeAjoute = new AnimeAjoute();
                $animeAjoute->hydrate($donnees);
                $listeAnimesAjoutes[] = $animeAjoute;
            }
            
            return $listeAnimesAjoutes;
        }


        public function add(AnimeAjoute $animeAjoute){
            // on utilise l'objet $bdd de PDO et on utilise sa méthode prepare
            // on donne un nom à chacun des champs qui vont varier ":pseudo"
            $req = $this->bdd->prepare(' INSERT INTO animes_ajoutes(id_anime, idUser) VALUES(:id_anime, :idUser) ');
            
            // pour chaque VALUES :idUser, :id_anime
            // je vais insérer la valeur respective en passant par chaque getter correspondant  
            // en respectant bien l'ordre des VALUES 
            // et on vérifie que le champ est du bon type
            $req->bindValue(':id_anime', $animeAjoute->getId_anime(), PDO::PARAM_INT);           
            $req->bindValue(':idUser', $animeAjoute->getIdUser(), PDO::PARAM_INT);
            $req->execute();
        }
    }


?> 