
<?php
session_start();
require "Employe.php";
if(empty($_POST))
{
  Employe::ToConnect();
  $rows=Employe::$cnx->query("select * from Employe")->fetchAll();
  $_SESSION['rows']=$rows;
  $_SESSION['pos']=0;
  Employe::DisConnect();
}
function Afficher($p)
{ 
    global $rep;
    $row=$_SESSION['rows'][$p];
    $rep=new Employe();
    $rep->Matricule=$row['Matricule'];
    $rep->Nom=$row['Nom'];
    $rep->Prenom=$row['Prenom'];
    $rep->DateNaissance=$row['DateNaissance'];
    $rep->Salaire=$row['Salaire'];
}
function Init()
{
  $e=new Employe();
  $e->Matricule=0;
  $e->Nom="";
  $e->Prenom="";
  $e->DateNaissance="";
  $e->Salaire=0.0;
  return $e;
}
$rep=Init();
if(isset($_POST['btnClear']))
{
    $rep=Init();    
}
if(isset($_POST['btnFind']))
{
    $emp=new Employe();
    $emp->Matricule=(int)$_POST['tMatricule'];
    if($emp->Find($emp->Matricule)!=null)
            $rep=$emp->Find($emp->Matricule);     
}
if(isset($_POST['btnAdd']))
{
    $emp=new Employe();
    $emp->Matricule=(int)$_POST['tMatricule'];
    $emp->Nom=$_POST['tNom'];
    $emp->Prenom=$_POST['tPrenom'];
    $emp->DateNaissance=$_POST['tDateNaissance'];
    $emp->Salaire=(float)$_POST['tSalaire'];
    $r=$emp->Add();  
    if($r==1)   
        echo "<script>alert('Added Succefully');</script>";
    if($r==0)   
        echo "<script>alert('Not Added : Exist');</script>";
    if($r==2)   
        echo "<script>alert('Not Added : Exception');</script>";    
}
if(isset($_POST['btnDelete']))
{
    $emp=new Employe();
    $emp->Matricule=(int)$_POST['tMatricule'];
    $r=$emp->Delete();  
    if($r==1)   
        echo "<script>alert('Deleted Succefully');</script>";
    if($r==0)   
        echo "<script>alert('Not Exist ');</script>";
    if($r==2)   
        echo "<script>alert('Not Deleted : Exception');</script>";    
}
if(isset($_POST['btnUpdate']))
{
    $emp=new Employe();
    $emp->Matricule=(int)$_POST['tMatricule'];
    $emp->Nom=$_POST['tNom'];
    $emp->Prenom=$_POST['tPrenom'];
    $emp->DateNaissance=$_POST['tDateNaissance'];
    $emp->Salaire=(float)$_POST['tSalaire'];
    $r=$emp->Update();  
    if($r==1)   
        echo "<script>alert('Updated Succefully');</script>";
    if($r==0)   
        echo "<script>alert('Not Exist');</script>";
    if($r==2)   
        echo "<script>alert('Not Updated : Exception');</script>";    
}
if(isset($_POST['btnFirst']))
{
    $pos=0;
    $_SESSION['pos']=$pos;
    Afficher($pos);
}
if(isset($_POST['btnPrevious']))
{
   $pos=$_SESSION['pos'];
   if($pos>0)
   {
      $pos--;
      $_SESSION['pos']=$pos;   
   }
   Afficher($pos);
}
if(isset($_POST['btnNext']))
{
  $pos=$_SESSION['pos'];
  $rows=$_SESSION['rows'];
  if($pos < count($rows)-1)
  {
    $pos++;
    $_SESSION['pos']=$pos; 
  }
  Afficher($pos);
}
if(isset($_POST['btnLast']))
{
  
  $rows=$_SESSION['rows'];
  $pos=count($rows)-1;
  $_SESSION['pos']=$pos;
  Afficher($pos); 
}
?>
<html>
   <head>
     <title>Rechercher Employé</title>   
   </head>
   <body>
    <form name="frm1" action="MiseAJourEmploye.php" method="post">
      <table border="1">
      <tr  style="background-color:aqua ;color:brown;height:50px;">
          <td>Champ</td>
          <td>Valeur</td>
          <td>Opération</td>
        </tr>
        <tr>
          <td>Matricule</td>
          <td><input type="text" name="tMatricule" value="<?php echo $rep->Matricule; ?>"/></td>
          <td><input type="submit" name="btnClear" value="Clear" /></td>
        </tr>
        <tr>
          <td>Nom</td>
          <td><input type="text" name="tNom" value="<?php echo $rep->Nom; ?>"/></td>
          <td><input type="submit" name="btnFind" value="Find" /></td>
        </tr>
        <tr>
          <td>Prénom</td>
          <td><input type="text" name="tPrenom" value="<?php echo $rep->Prenom; ?>"/></td>
          <td><input type="submit" name="btnAdd" value="Add" /></td>
        </tr>
        <tr>
          <td>Date de Naissance</td>
          <td><input type="text" name="tDateNaissance" value="<?php echo $rep->DateNaissance; ?>"/></td>
          <td><input type="submit" name="btnDelete" value="Delete" /></td>
        </tr>
        <tr>
          <td>Salaire</td>
          <td><input type="text" name="tSalaire" value="<?php echo $rep->Salaire; ?>"/></td>
          <td><input type="submit" name="btnUpdate" value="Update" /></td>
        </tr>
        <tr>
          <td><input type="submit" name="btnFirst" value="First"/></td>
          <td><input type="submit" name="btnPrevious" value="Previous"/></td>
          <td><input type="submit" name="btnNext" value="Next"</td>
          <td><input type="submit" name="btnLast" value="Last" /></td>
        </tr>
      </table>
        <br/><br/>      
    
                    
    <br/><br/>      
    </form>
    </body>
  </html>