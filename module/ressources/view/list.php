<table class="table table-striped">
	<tr>
		
		<th>Nom</th>
		
		<th>Niveau (P/R)</th>
		
		<th>Discipline</th>
		
		<th>url d&#039;acc&egrave;s aux statistiques</th>
		
		<th>Login</th>
		
		<th>et mot de passe</th>
		
		<th>ou mail</th>

		<th>Commentaires</th>
		
		<th></th>
	</tr>
	<?php if($this->tRessources):?>
		<?php foreach($this->tRessources as $oRessources):?>
		<tr <?php echo plugin_tpl::alternate(array('','class="alt"'))?>>
			
		<td><?php echo $oRessources->nom ?></td>
		
		<td><?php echo $oRessources->niveau ?></td>
		
		<td><?php if(isset($this->tJoinmodel_disciplines[$oRessources->discipline])){ echo $this->tJoinmodel_disciplines[$oRessources->discipline];}else{ echo $oRessources->discipline ;}?></td>
		
		<td><?php echo $oRessources->url ?></td>
		
		<td><?php echo $oRessources->login ?></td>
		
		<td><?php echo $oRessources->mdp ?></td>
		
		<td><?php echo $oRessources->mail ?></td>

		<td><?php echo $oRessources->comment ?></td>
		
			<td>
				
				
<a class="btn btn-success" href="<?php echo $this->getLink('ressources::edit',array(
										'id'=>$oRessources->getId()
									) 
							)?>">Edit</a>
			| 
<a class="btn btn-danger" href="<?php echo $this->getLink('ressources::delete',array(
										'id'=>$oRessources->getId()
									) 
							)?>">Delete</a>
			
				
				
			</td>
		</tr>	
		<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="8">Aucune ligne</td>
		</tr>
	<?php endif;?>
</table>

<p><a class="btn btn-primary" href="<?php echo $this->getLink('ressources::new') ?>">New</a></p>
			
