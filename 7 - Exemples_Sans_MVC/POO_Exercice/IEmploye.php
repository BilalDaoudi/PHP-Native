<?php

interface IEmploye{

  public function Age();
  public function Anciennete();
  public function DateRetraite($ageretrait);
  public function SalaireAPayer();
}
?>