Ressource;Prix;Différentiel prix/prévisions;Téléchargements;Cout par téléchargement
<?php
foreach($this->tItem as $oItem):
   echo html_entity_decode($this->tJoinmodel_ressources[$oItem->id_ressource]);
   echo ';';
   echo html_entity_decode($oItem->prix);
   echo ';';
   echo html_entity_decode($oItem->diff_prev);
   echo ';';
   echo html_entity_decode($oItem->telechargements);
   echo ';';
   echo html_entity_decode($oItem->ratio_prix_telechargement);
   echo "\n";
endforeach;