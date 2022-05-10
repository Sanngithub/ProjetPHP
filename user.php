<?php
<<<<<<< HEAD
    class User{
        private int $id_user;   // vraiment besoin d'un id ? on va trier par le pseudo de toute façon pour vérifier que 2 utilisateurs ont 2 pseudo différents ...
        private String $pseudo;
        private String $password;
        private String $email;
        private String $nom;
        private String $prenom;
        

        // Getters & Setters
        public function getIdUser(){return $this->id_user;}
        public function getPseudo(){return $this->pseudo;}
        public function getPassword(){return $this->password;}
        public function getEmail(){return $this->email;}
        public function getNom(){return $this->nom;}
        public function getPrenom(){return $this->prenom;}
        

        public function setIdUser($id){
            $this->id_user = $id;
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
=======
class User{
    private int $id_user;
    private String $pseudo;
    private String $password;
    private String $nom;
    private String $prenom;
    private String $email;
    

    // Getters & Setters
    public function getIdUser(){return $this->id_user;}
    public function getPseudo(){return $this->pseudo;}
    public function getPassword(){return $this->password;}
    public function geteMail(){return $this->email;}
    public function getNom(){return $this->nom;}
    public function getPrenom(){return $this->prenom;}
    

    public function setIdUser($id){
        $this->id_user = $id;
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
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
}

>>>>>>> dbce7a6cd2db0b8e40548534f33b3b762aa780fe
?>