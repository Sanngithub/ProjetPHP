<?php
    class User{

        private $idUser;
        private $pseudo;
        private $password;
        private $email;
        private $nom;
        private $prenom;
        

        // Getters & Setters
        public function getIdUser(){return $this->idUser;}
        public function getPseudo(){return $this->pseudo;}
        public function getPassword(){return $this->password;}
        public function getEmail(){return $this->email;}
        public function getNom(){return $this->nom;}
        public function getPrenom(){return $this->prenom;}
        

        public function setIdUser($id){
            $this->idUser = (int)$id;
        }

        public function setPseudo($pseudo){
            $this->pseudo = $pseudo;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setNom($nom){
            $this->nom = $nom;
        }

        public function setPrenom($prenom){
            $this->prenom = $prenom;
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
    $user = new User();
?>