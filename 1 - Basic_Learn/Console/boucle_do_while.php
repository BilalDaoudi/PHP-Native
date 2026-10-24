<?php
$nb=(int)readline("Donner un Entier :");
$SomDiv=0;
$div=1;
do
{
 if($nb % $div == 0)
 {
     $SomDiv+=$div;
 }
 $div++;
}while($div<=$nb);
 
if($SomDiv==2*$nb)
{
    echo "$nb est Parfait \n";
}
else
{
    echo "$nb n'est Pas Parfait \n";
}
 
?>