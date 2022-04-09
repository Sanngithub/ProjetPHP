<?php

    class User {

        // attributs
        private $id;
        private $pseudo;
        private $mail;
        private $password;
        private $nom;
        private $prenom;


        // constructeur via hydrate
        public function hydrate(array $donnees) {

            foreach ($donnees as $key => $value) {
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }


        // getters
        public function getId() { 
            return $this->id; 
        }

        public function getPseudo() { 
            return $this->pseudo; 
        }
        public function getMail() { 
            return $this->mail; 
        }
        public function getPassword() { 
            return $this->password;  
        }
        public function getNom() { 
            return $this->nom; 
        }
        public function getPrenom() { 
            return $this->prenom; 
        }


        public function setId($id) {
            $this->id = (int) $id;
        }

        public function setPseudo($pseudo) {
            $this->pseudo = $pseudo;
        }

        public function setMail($mail) {
            $this->mail = $mail;
        }

        public function setPassword($password) {
            $this->password = $password;
        }
        public function setNom($nom) {
            $this->nom = $nom;
        }
        public function setPrenom($prenom) {
            $this->prenom = $prenom;
        }


    }

// VERIFIER QUE LES TOUS ATTRIBUTS DANS LE CRUD SONT BIEN UTILISES
// A VOIR AVEC JOHN L'ORDRE DES ATTRIBUTS DE LA TABLE USER
    class UserManager {


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
        
        public function add(User $user){
            // on utilise l'objet $bdd de PDO et on utilise sa méthode prepare
            // on donne un nom à chacun des champs qui vont varier ":pseudo"
            $req = $this->bdd.prepare('INSERT INTO users(pseudo, mail, password) VALUES(:pseudo, :mail, :password) ');
            
            // pour chaque VALUES :pseudo, :mail, :password 
            // je vais insérer la valeur respective en passant par chaque getter correspondant  
            // en respectant bien l'ordre des VALUES 
            // et on vérifie que le champ est du bon type
            $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
            $req->bindValue(':mail', $user->getMail());
            $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
            
            $req->execute();
        }
        
        // ---------------------------------------------------------------------
        
        public function getById($id) {
            // on s'assure que $id est bien un int
            $id = (int)$id;
            
            // on prépare la requête 
            $req = $this->bdd->prepare('SELECT * FROM users WHERE id = ?');
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
        
        // ---------------------------------------------------------------------
        
        public function delete(User $user) {
            $this->bdd->exec( 'DELETE FROM users WHERE id = '.$user->getId() );
        }
        
        // ---------------------------------------------------------------------
        
        public function getAll() {
            
            $users = [];
            $req = $this->bdd->query( 'SELECT * FROM users');
            
            while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
                $user = new User();
                $user->hydrate($donnees);
                $users[] = $user;
            }
            
            return $users;
        }
        
        // ---------------------------------------------------------------------
        
        public function update(User $user) {
            
            $req = $this->bdd->prepare( 'UPDATE users SET pseudo = :pseudo, mail = :mail, password = :password WHERE id = :id');
            
            $req->bindValue(':id', $user->getId(), PDO::PARAM_INT);
            $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
            $req->bindValue(':mail', $user->getMail());
            $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);

            $req->execute();
        }
        

        public function login($pseudo) {

            $req = $this->bdd->prepare('SELECT * FROM users WHERE pseudo=?');
            // $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
            // $req->execute();
            $req->execute(array($pseudo));

            if($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
                
                $user = new User();
                $user->hydrate($donnees);
                return $user;

            } else {
                return false;
            }
        }
        
    }




?> 