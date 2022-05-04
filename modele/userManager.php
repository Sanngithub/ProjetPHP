<?php

    require 'userClass.php';

    class UserManager{

        private $bdd;

        public function __construct(PDO $bdd){
            $this->setDb($bdd);
        }

        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }


        public function add(User $user){
            $hashedPassword = password_hash($user->getPassword(), PASSWORD_BCRYPT);
            $user->setPassword($hashedPassword);
            
            if ($this->isAlreadyExist($user) === false){
                try{
                    $req = $this->bdd->prepare('INSERT INTO users(pseudo, password, email, nom, prenom) VALUES(:pseudo, :password, :email, :nom, :prenom)');
                    $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
                    $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
                    $req->bindValue(':email', $user->getEmail());
                    $req->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
                    $req->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
    
                    $req->execute();
                    return true;
                }
                catch(Exception $e){
                    die('Erreur : '.$e->getMessage());
                }
            }
            else{
                echo 'Erreur : Pseudo déjà utilisé !';
                return false;
            }
        }


        public function get(User $user){
            $pseudo = (String)$user->getPseudo();

            $req = $this->bdd->prepare('SELECT * FROM users WHERE pseudo = ?)');
            $req->execute(array($pseudo));
            //PDO::FETCH_ASSOC retourne un tableau associatif indexé par le nom des champs
            // cf. documentation : https://www.php.net/manual/fr/pdostatement.fetch.php
            // pour d'autres types de FETCH !!!
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $user = new User();
            $user->hydrate($donnees);

            return $user;
        }

        public function getById($id) {
            // on s'assure que $id est bien un int
            $id = (int)$id;
            
            // on prépare la requête 
            $req = $this->bdd->prepare('SELECT * FROM users WHERE idUser = ?');
            // si elle fonctionne, on l'éxécute en y passant sous forme de tableau, les valeurs recherchées
            $req->execute(array($id));
            // PDO::FETCH_ASSOC retourne un tableau associatif indexé par le nom des champs
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            // je créé un nouvel objet User 
            $user = new User();
            // je le construis via la méthode hydrate
            $user->hydrate($donnees);
            // je retourne l'user 
            return $user;
        }


        public function getAll(){
            $users = [];

            $req = $this->bdd->prepare('SELECT * FROM users');
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $user = new User();
                $user->hydrate($donnees);
                $users[] = $user;
            }
            return $users;
        }


        public function update(User $user){
            // $hashedPassword = password_hash($user->getPassword(), PASSWORD_BCRYPT);
            // $user->setPassword($hashedPassword);

            try{
                $req = $this->bdd->prepare('UPDATE users SET pseudo = :pseudo, password = :password, nom = :nom, prenom = :prenom, email = :email  WHERE idUser = :id');
                $req->bindValue(':id', $user->getIdUser(), PDO::PARAM_INT);
                $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
                $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
                $req->bindValue(':email', $user->getEmail());
                $req->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
                $req->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
                
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
            
        }


        public function delete(User $user){
            $this->bdd->exec('DELETE FROM users WHERE idUser = '.$user->getIdUser());
        }
        

        public function login($pseudo, $password){

            $req = $this->bdd->prepare('SELECT password FROM users WHERE pseudo = :pseudo');
            $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $req->execute();

            if($donnees = $req->fetch(PDO::FETCH_ASSOC)){

                if(password_verify($password, $donnees['password'])){
                    $req2 = $this->bdd->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
                    $req2->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
                    $req2->execute();
                    
                    if($donnees = $req2->fetch(PDO::FETCH_ASSOC)){
                        $user = new User();
                        $user->hydrate($donnees);
                        return $user;
                    }
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
      
        }


        public function isAlreadyExist(User $user){
            $alreadyexist = false;
            $dbusers = $this->getAll();
            foreach ($dbusers as $dbuser){
                if ($dbuser->getPseudo() === $user->getPseudo()){
                    $alreadyexist = true;
                }
            }
            return $alreadyexist;
        }
    }
?>