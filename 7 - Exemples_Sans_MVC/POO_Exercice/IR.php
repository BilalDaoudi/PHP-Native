<?php


abstract class IR
{
    public static $_tranches = [
        [0, 28000],
        [28001, 40000],
        [40001, 50000],
        [50001, 60000],
        [60001, 150000],
        [150000, 100000000000]
    ];
    public static $_tauxIR = ["0%", "12%", "24%", "34%", "38%", "40%"];

    public abstract static function getIR($salaire);
}

        


?>
