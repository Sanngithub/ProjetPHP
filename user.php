<?php
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

?>