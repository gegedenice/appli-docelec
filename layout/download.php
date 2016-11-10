<?php
header('Cache-Control:public');
header('Pragma:');
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Content-Disposition: attachment; filename=\"".$this->sFileName."\"");
header('Content-Transfer-Encoding:binary');
header("Content-Type: application/".$this->sExtension.";name=\"".$this->sFileName."\"");

flush();
echo"\xEF\xBB\xBF"; //Permet a Excel de reconnaitre que le fichier est en UTF-8
echo $this->load('main')?>