<?php


// $d1 = (array)new DateTime("2002-02-2");
// print_r($d1["date"]);

// $dt_sys = new DateTime();
// $dtn = new DateTime("2002-12-09");
// $t = (array)(date_diff($dt_sys, $dtn));

// print_r($t)

$dtn = new DateTime("2002-12-9");
$t = (array)($dtn);
$t1 = explode(' ',$t["date"]);
print_r($t1);
$t2 = explode('-',$t1[0]);
print_r($t2);




?>


<a href="IR.php"><input type="button" value="IR" onclick="return confirm('sure ?')"></a>