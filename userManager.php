<?php
    class UserManager{
        private PDO $bdd;


        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }


        public function __construct($bdd){
            $this->setDb($bdd);
        }


        public function add(User $user){
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
            try{
                $req = $this->bdd->prepare('UPDATE users SET pseudo = :pseudo, password = :password, nom = :nom, prenom = :prenom, email = :email,  WHERE users_id = :id');
                $req->bindValue(':id', $user->getIdUser(), PDO::PARAM_INT);
                $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
                $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
                $req->bindValue(':email', $user->getEmail());
                if ($user.getNom() != NULL){    // nécessaire ?
                    $req->bindValue(':nom', $user.getNom(), PDO::PARAM_STR);
                }
                if ($user.getPrenom() != NULL){
                    $req->bindValue(':prenom', $user.getPrenom(), PDO::PARAM_STR);
                }

                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
            
        }


        public function login($pseudo){
            $req = $this->bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
            $req->execute(array($pseudo));
            if($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $user = new User();
                $user->hydrate($donnees);
                return $user;
            }
            else{
                return false;
            }
        }
    }

?>