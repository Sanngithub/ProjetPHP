<?php
    class Anime{
        private  $id_anime;
        private  $titre_native;
        private  $titre_romaji;
        private  $titre_fr;
        private  $status;
        private  $studio;
        private  $genre;
        private  $synopsis;
        private  $nb_episodes;
        private  $note;
        private  $jaquette;
        private  $createur;
        

        // Getters & Setters
        
        public function getId_anime(){return $this->id_anime;}
        public function getTitre_native(){return $this->titre_native;}
        public function getTitre_romaji(){return $this->titre_romaji;}
        public function getTitre_fr(){return $this->titre_fr;}
        public function getStatus(){return $this->status;}
        public function getStudio(){return $this->studio;}
        public function getGenre(){return $this->genre;}
        public function getSynopsis(){return $this->synopsis;}
        public function getNb_episodes(){return $this->nb_episodes;}
        public function getNote(){return $this->note;}
        public function getJaquette(){return $this->jaquette;}
        public function getCreateur(){return $this->createur;}
        

        public function setId_anime($id){
            $this->id_anime = (int)$id;
        }

        public function setTitre_native($titre_nat){
            $this->titre_native = $titre_nat;
        }

        public function setTitre_romaji($titre_rom){
            $this->titre_romaji = $titre_rom;
        }

        public function setTitre_fr($titre_fra){
            $this->titre_fr = $titre_fra;
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function setStudio($studio){
            $this->studio = $studio;
        }

        public function setGenre($genre){
            $this->genre = $genre;
        }

        public function setSynopsis($synopsis){
            $this->synopsis = $synopsis;
        }

        public function setNb_episodes($nb_episodes){
            $this->nb_episodes = (int)$nb_episodes;
        }
        public function setNote($note){
            $this->note = (float)$note;
        }
        public function setJaquette($jaquette){
            $this->jaquette = $jaquette;
        }
        
        public function setCreateur($createur) {
            $this->createur = (int)$createur;
        }
        

        // Other functions
        public function hydrate(array $donnees){
            foreach($donnees as $key => $value){
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method) && $value != NULL){
                    $this->$method($value);
                }
            }
        }
    }
?>