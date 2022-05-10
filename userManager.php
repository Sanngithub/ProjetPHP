<?php
<<<<<<< HEAD
    require './user.php';

=======
>>>>>>> dbce7a6cd2db0b8e40548534f33b3b762aa780fe
    class UserManager{
        private PDO $bdd;


        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }


        public function __construct($bdd){
            $this->setDb($bdd);
        }


        public function add(User $user){
<<<<<<< HEAD
            $hashedPassword = password_hash($user->getPassword(), PASSWORD_BCRYPT);
            $user->setPassword($hashedPassword);
            
            if ($this->isAlreadyExist($user) === false){
                try{
                    $req = $this->bdd->prepare('INSERT INTO users(pseudo, password, email) VALUES(:pseudo, :password, :email)');
                    $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
                    $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
                    $req->bindValue(':email', $user->getEmail());
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
=======
            $req = $this->bdd->prepare('INSERT INTO users(pseudo, password, nom, prenom, email) VALUES(:pseudo, :password, :nom, :prenom, :email)');
           
            try{
                $req->bindValue(':pseudo', $user.getPseudo(), PDO::PARAM_STR);
                $req->bindValue(':password', $user.getPassword(), PDO::PARAM_STR);
                $req->bindValue(':email', $user.getEmail());
                if ($user.getNom() != NULL){    // nécessaire ?
                    $req->bindValue(':nom', $user.getNom(), PDO::PARAM_STR);
                }
                if ($user.getPrenom() != NULL){
                    $req->bindValue(':prenom', $user.getPrenom(), PDO::PARAM_STR);
                }
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }

            $req->execute();
        }


        public function delete(User $user){
            $this->bdd->exec('DELETE FROM users WHERE id_users = '.$user.getIdUser());
        }


        public function get(User $id){
            $id = (int)$id;

            $req = $this->bdd->prepare('SELECT * FROM users WHERE id_users = ?)');
            $req->execute(array($id));
>>>>>>> dbce7a6cd2db0b8e40548534f33b3b762aa780fe
            //PDO::FETCH_ASSOC retourne un tableau associatif indexé par le nom des champs
            // cf. documentation : https://www.php.net/manual/fr/pdostatement.fetch.php
            // pour d'autres types de FETCH !!!
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $user = new User();
            $user->hydrate($donnees);

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
<<<<<<< HEAD
            $hashedPassword = password_hash($user->getPassword(), PASSWORD_BCRYPT);
            $user->setPassword($hashedPassword);

=======
>>>>>>> dbce7a6cd2db0b8e40548534f33b3b762aa780fe
            try{
                $req = $this->bdd->prepare('UPDATE users SET pseudo = :pseudo, password = :password, nom = :nom, prenom = :prenom, email = :email,  WHERE users_id = :id');
                $req->bindValue(':id', $user->getIdUser(), PDO::PARAM_INT);
                $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
                $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
                $req->bindValue(':email', $user->getEmail());
                if ($user.getNom() != NULL){    // nécessaire ?
<<<<<<< HEAD
                    $req->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
                }
                if ($user.getPrenom() != NULL){
                    $req->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
=======
                    $req->bindValue(':nom', $user.getNom(), PDO::PARAM_STR);
                }
                if ($user.getPrenom() != NULL){
                    $req->bindValue(':prenom', $user.getPrenom(), PDO::PARAM_STR);
>>>>>>> dbce7a6cd2db0b8e40548534f33b3b762aa780fe
                }

                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
            
        }


<<<<<<< HEAD
        public function delete(User $user){
            $this->bdd->exec('DELETE FROM users WHERE id_users = '.$user->getIdUser());
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
=======
        public function login($pseudo){
            $req = $this->bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
            $req->execute(array($pseudo));
            if($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $user = new User();
                $user->hydrate($donnees);
                return $user;
>>>>>>> dbce7a6cd2db0b8e40548534f33b3b762aa780fe
            }
            else{
                return false;
            }
        }
<<<<<<< HEAD

        public function logout(){
            $user = new User();
            return $user;
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
=======
    }

>>>>>>> dbce7a6cd2db0b8e40548534f33b3b762aa780fe
?>