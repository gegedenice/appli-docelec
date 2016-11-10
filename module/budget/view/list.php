<table class="table table-striped">
	<tr>
		
		<th>Ressource</th>
		
		<th>Prix en devise</th>
		
		<th>Taux de change</th>
		
		<th>Prix en euros HT</th>
		
		<th>Taux de TVA</th>
		
		<th>Prix TTC</th>
		
		<th>taux de r&eacute;cup&eacute;ration TVA (TVA mixte)</th>

		<th>Prix final prévu</th>
		
		<th>Prix final réel</th>

		<th>Commentaire</th>
		
		<th></th>
	</tr>
	<?php if($this->tBudget):?>
		<?php foreach($this->tBudget as $oBudget):?>
		<tr <?php echo plugin_tpl::alternate(array('','class="alt"'))?>>
			
		<td><?php if(isset($this->tJoinmodel_ressources[$oBudget->id_ressource])){ echo $this->tJoinmodel_ressources[$oBudget->id_ressource];}else{ echo $oBudget->id_ressource ;}?></td>
		
		<td><?php echo $oBudget->prix_devise_ht ?></td>
		
		<td><?php echo $oBudget->taux_change ?></td>
		
		<td><?php echo $oBudget->prix_euro_ht ?></td>
		
		<td><?php echo $oBudget->taux_tva ?></td>
		
		<td><?php echo $oBudget->prix_ttc ?></td>
		
		<td><?php echo $oBudget->taux_recup_tva ?></td>

		<td><?php echo $oBudget->prev_prix ?></td>
		
		<td><?php echo $oBudget->prix ?></td>

		<td><?php echo $oBudget->comment?></td>
		
			<td>
				
	<a class="btn btn-success" href="<?php echo $this->getLink('budget::edit',array(
										'id'=>$oBudget->getId()
									) 
							)?>">Edit</a>			
			</td>
		</tr>	
		<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="9">Aucune ligne</td>
		</tr>
	<?php endif;?>
</table>
</div>
</div>
<!-- On masque le bouton puisque l'ajout/suppression est géré au niveau de l'onglet Ressources (admin)
<p><a class="btn btn-primary" href="<?php echo $this->getLink('budget::new') ?>">New</a></p> -->

			
