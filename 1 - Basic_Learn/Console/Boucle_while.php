<?php
 
$i=1;
while($i<=10)
{
   echo $i;
   echo "\n"; 
   $i++;
}
 
$nb=(int)readline("Donner un Entier :");
$NbDiv=0;
$div=1;
while($div<=$nb)
{
    if( $nb % $div == 0)
    {
        $NbDiv++;
    }
    $div++;
}
 
if($NbDiv<=2)
{
    echo "$nb est Premier \n";
}
else
{
    echo "$nb n'est pas Premier \n";
}
echo "Nombre de Diviseurs : $NbDiv \n";

?>