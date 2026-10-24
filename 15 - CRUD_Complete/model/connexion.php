<?php

class Connexion
{
    public $server = 'localhost';
    public $dbname = 'CRUD_Complete';
    public $user = 'root';
    public $pass = '12345678';
    static $cnx = null;

    public function __construct($ser = 'localhost', $dbname = 'CRUD_Complete', $user = 'root', $pass = '12345678')
    {
        $this->server = $ser;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->pass = $pass;
    }
    public function connexion()
    {
        try {
            Connexion::$cnx = new PDO("mysql:host={$this->server};dbname={$this->dbname}", $this->user, $this->pass);
        } catch (PDOException  $er) {
        }
    }

    public function Deconnexion()
    {
        Connexion::$cnx = null;
    }

    public function message($message, $mode)
    {
        return "<div class='alert alert-" . htmlspecialchars($mode) . " alert-dismissible fade show w-100 m-2'>" .
            htmlspecialchars($message) .
            "<button type='button' class='close bg-" . htmlspecialchars($mode) . "' data-dismiss='alert' style='border: none;' aria-label='Close'>&times;</button>
        </div>";
    }
}
