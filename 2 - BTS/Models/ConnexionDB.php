<?php  

abstract class ConnexionDB
{
    public $server;
    public $dbname;
    public $user;
    public $pass;
    static $cnx = null;

    public function __construct($ser = 'localhost', $dbname = 'gestion_decole', $user = 'root', $pass = '')
    {
        $this->server = $ser;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->pass = $pass;
    }
    public function connexion()
    {
        try {
            ConnexionDB::$cnx = new PDO("mysql:host={$this->server};dbname={$this->dbname}", $this->user, $this->pass);
        } catch (PDOException  $er) {
            // Erreur Connexion DB
        }
    }

    public function Deconnexion()
    {
        ConnexionDB::$cnx = null;
    }
    
}


?>