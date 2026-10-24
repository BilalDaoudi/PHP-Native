
<?php
class Employe
{
    //Les Attributs de Classe
    public static $servername='localhost';
    public static $db='GestionProjets';
    public static $username='root';
    public static $password='';
    public static $cnx=null;
    //Les Méthodes de Classe
    public static function ToConnect()
    {        
        $datasource=sprintf("mysql:host=%s;dbname=%s",self::$servername,self::$db);
        self::$cnx=new PDO($datasource,self::$username,self::$password);
    }
    public static function DisConnect()
    {
        self::$cnx=null;
    }
    //Les Attributs d'objet
    public int $Matricule;
    public string $Nom;
    public string $prenom;
    public string $DateNaissance;
    public float $Salaire;
    //Constructeur
    function constr()
    {}
    
    //Les Méthodes d'objet
    public function Find(int $mat)
    {
        $e=null;
        self::ToConnect();
        $row=self::$cnx->query("select * from Employe where Matricule=$mat")->fetch();
        if($row)
        {
            $e=new Employe();
            $e->Matricule=$row['Matricule'];
            $e->Nom=$row['Nom'];
            $e->Prenom=$row['Prenom'];
            $e->DateNaissance=$row['DateNaissance'];
            $e->Salaire=$row['Salaire'];
            return $e;
        }
        else
            return null;
        self::DisConnect();
    }
    public function Add()
    {
        $r=$this->Find($this->Matricule);
        if($r==null)
            {
                try{
                    $req=sprintf(
                    "insert into Employe values(%d,'%s','%s','%s',%f)",
                    $this->Matricule,
                    $this->Nom,
                    $this->Prenom,
                    $this->DateNaissance,
                    $this->Salaire );
                    self::ToConnect();
                    $n=self::$cnx->exec($req);
                    if($n==1)
                        {
                            self::DisConnect();
                            return 1; // Added
                        }
                }
                catch(PDOException $ex)
                {
                    self::DisConnect();
                    echo '<script>alert("'.$ex->getMessage().'");</script>';              
                    return 2; // Exception : PK
                }
            }
        else
            return 0;  //Exist
    }
    public function Delete()
    {
        $r=$this->Find($this->Matricule);
        if($r!=null)
        {
            try{    
                $req=sprintf("delete from Employe where Matricule=%d", $this->Matricule );
                self::ToConnect();
                $n=self::$cnx->exec($req);
                if($n==1)
                    {
                        self::DisConnect();
                        return 1; // Deleted
                    }
            }
            catch(PDOException $ex)
            {
                self::DisConnect();
                echo '<script>alert("'.$ex->getMessage().'");</script>';
                return 2; // Exception : PK
            }
        }
        else
            return 0;  //Not Exist
    }
    public function Update()
    {
        $r=$this->Find($this->Matricule);
        if($r!=null)
            {
                try{
                    $req=sprintf(
                    "update Employe 
                    set Nom='%s',Prenom='%s',DateNaissance='%s',Salaire=%f where Matricule=%d",
                    $this->Nom,
                    $this->Prenom,
                    $this->DateNaissance,
                    $this->Salaire,
                    $this->Matricule);
                    self::ToConnect();
                    $n=self::$cnx->exec($req);
                    if($n==1)
                        {
                            self::DisConnect();
                            return 1; // Updated
                        }
                }
                catch(PDOException $ex)
                {
                    echo '<script>alert("'.$ex->getMessage().'");</script>';
                    self::DisConnect();
                    return 2; // Exception : PK
                }
            }
        else
            return 0;  // Not Exist
    }

}
?>
