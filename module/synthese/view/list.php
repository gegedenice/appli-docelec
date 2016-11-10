<p><a class="btn btn-link" href="<?php echo $this->getLink('synthese::graph')?>">Graphiques</a></p>
<p><a class="btn btn-link" href="<?php echo $this->getLink('synthese::excel')?>">Export csv</a></p>
<table class="table table-striped">
	<tr>
		
		<th>Ressource</th>
		
		<th>Prix</th>

    <th>Différentiel prix réel/prévision</th>
		
		<th>Nombre total de t&eacute;l&eacute;chargements</th>
		
		<th>Co&ucirc;t au t&eacute;l&eacute;chargement</th>
		
		<th></th>
	</tr>
	<?php if($this->tSynthese):?>
		<?php foreach($this->tSynthese as $oSynthese):?>
		<tr <?php echo plugin_tpl::alternate(array('','class="alt"'))?>>
			
		<td><?php if(isset($this->tJoinmodel_ressources[$oSynthese->id_ressource])){ echo $this->tJoinmodel_ressources[$oSynthese->id_ressource];}else{ echo $oSynthese->id_ressource ;}?></td>
		
		<td><?php echo $oSynthese->prix ?></td>

    <td><?php echo $oSynthese->diff_prev ?></td>
		
		<td><?php echo $oSynthese->telechargements ?></td>
		
		<td><?php echo $oSynthese->ratio_prix_telechargement ?></td>
		
			<td>			
				
			</td>
		</tr>	
		<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="5">Aucune ligne</td>
		</tr>
	<?php endif;?>
</table>

<!-- On masque le bouton puisque l'ajout/suppression est géré au niveau de l'onglet Ressources (admin)
<p><a class="btn btn-primary" href="<?php echo $this->getLink('synthese::new') ?>">New</a></p> -->