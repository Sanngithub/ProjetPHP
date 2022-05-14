<?php
    require '../modele/animeClass.php';

    class AnimeManager{
        
        private $bdd;
        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }


        public function __construct(PDO $bdd){
            $this->setDb($bdd);
        }


        public function add(Anime $anime){
            
            if ($this->isAlreadyExist($anime) === false){
 
                try{
                    $req = $this->bdd->prepare('INSERT INTO animes(titre_native, titre_romaji, titre_fr, status, studio, genre, synopsis, nb_episodes, jaquette, createur)
                                                VALUES(:titre_native, :titre_romaji, :titre_fr, :status, :studio, :genre, :synopsis, :nb_episodes, :jaquette, :createur)');
                    $req->bindValue(':titre_native', $anime->getTitre_native(), PDO::PARAM_STR);
                    $req->bindValue(':titre_romaji', $anime->getTitre_romaji(), PDO::PARAM_STR);
                    $req->bindValue(':titre_fr', $anime->getTitre_fr(), PDO::PARAM_STR);
                    $req->bindValue(':status', $anime->getStatus(), PDO::PARAM_INT);
                    $req->bindValue(':studio', $anime->getStudio(), PDO::PARAM_STR);
                    $req->bindValue(':genre', $anime->getGenre(), PDO::PARAM_STR);
                    $req->bindValue(':synopsis', $anime->getSynopsis(), PDO::PARAM_STR);
                    $req->bindValue(':nb_episodes', $anime->getNb_episodes(), PDO::PARAM_INT);
                    $req->bindValue(':jaquette', $anime->getJaquette());
                    $req->bindValue(':createur', $anime->getCreateur(), PDO::PARAM_INT);
                    $req->execute();
                    return true;
                }
                catch(Exception $e){
                    die('Erreur : '.$e->getMessage());
                }
            }
            else{
                // A REFAIRE POUR L'AFFICHAGE DU MESSAGE D'ERREUR
                echo 'Erreur : Anime déjà présente !';
                return false;
            }
        }


        public function get(Anime $anime){
            $titre_fr = (String)$anime->getTitre_fr();

            $req = $this->bdd->prepare('SELECT * FROM animes WHERE titre_fr = ?)');
            $req->execute(array($titre_fr));
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $anime = new anime();
            $anime->hydrate($donnees);

            return $anime;
        }


        public function getAll(){
            $animes = [];

            $req = $this->bdd->prepare('SELECT * FROM animes');
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $anime = new anime();
                $anime->hydrate($donnees);
                $animes[] = $anime;
            }
            return $animes;
        }


        public function getAllByTitre(String $titre){
            $animes = [];

            $regexLIKE = '%'.$titre.'%';

            $req = $this->bdd->prepare('SELECT * FROM animes WHERE titre_native LIKE :titre_native OR titre_romaji LIKE :titre_romaji OR titre_fr LIKE :titre_fr');
            $req->bindValue(':titre_native', $regexLIKE, PDO::PARAM_STR);
            $req->bindValue(':titre_romaji', $regexLIKE, PDO::PARAM_STR);
            $req->bindValue(':titre_fr', $regexLIKE, PDO::PARAM_STR);
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $anime = new anime();
                $anime->hydrate($donnees);
                $animes[] = $anime;
            }
            return $animes;
        }
        
        
        public function getAllByGenre(String $genre){
            $animes = [];

            $regexLIKE = '%'.$genre.'%';

            $req = $this->bdd->prepare('SELECT * FROM animes WHERE genre LIKE ?');
            $req->execute(array($regexLIKE));
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $anime = new anime();
                $anime->hydrate($donnees);
                $animes[] = $anime;
            }
            return $animes;
        }


        public function update(Anime $anime){

            try{
                $req = $this->bdd->prepare('UPDATE animes SET titre_native = :titre_native, titre_romaji = :titre_romaji, titre_fr = :titre_fr, status = :status, studio =:studio, genre = :genre, synopsis = :synopsis, nb_episodes = :nb_episodes,  WHERE id_anime = :id');
                $req->bindValue(':id', $anime->getId_anime(), PDO::PARAM_INT);    
                $req->bindValue(':titre_native', $anime->getTitre_native(), PDO::PARAM_STR);
                $req->bindValue(':titre_romaji', $anime->getTitre_romaji(), PDO::PARAM_STR);
                $req->bindValue(':titre_fr', $anime->getTitre_fr(), PDO::PARAM_STR);
                $req->bindValue(':status', $anime->getStatus(), PDO::PARAM_INT);
                $req->bindValue(':studio', $anime->getStudio(), PDO::PARAM_STR);
                $req->bindValue(':genre', $anime->getGenre(), PDO::PARAM_STR);
                $req->bindValue(':synopsis', $anime->getSynopsis(), PDO::PARAM_STR);
                $req->bindValue(':nb_episodes', $anime->getNb_episodes(), PDO::PARAM_INT);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }


        public function delete(Anime $anime){
            $this->bdd->exec('DELETE FROM animes WHERE id_anime = '.$anime->getId_anime());
        }


        public function isAlreadyExist(Anime $anime){
            $alreadyexist = false;
            $dbanimes = $this->getAll();
            foreach ($dbanimes as $dbanime){
                if ($dbanime->getTitre_fr() === $anime->getTitre_fr()){
                    $alreadyexist = true;
                }
            }
            return $alreadyexist;
        }
    }
?>