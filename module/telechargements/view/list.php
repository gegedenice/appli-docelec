<table class="table table-striped">
	<tr>
		
		<th>id_ressource</th>
		
		<th>Janvier</th>
		
		<th>F&eacute;vrier</th>
		
		<th>Mars</th>
		
		<th>Avril</th>
		
		<th>Mai</th>
		
		<th>Juin</th>
		
		<th>Juillet</th>
		
		<th>Ao&ucirc;t</th>
		
		<th>Septembre</th>
		
		<th>Octobre</th>
		
		<th>Novembre</th>
		
		<th>D&eacute;cembre</th>

		<th>Commentaire</th>
		
		<th></th>
	</tr>
	<?php if($this->tTelechargements):?>
		<?php foreach($this->tTelechargements as $oTelechargements):?>
		<tr <?php echo plugin_tpl::alternate(array('','class="alt"'))?>>
			
		<td><?php if(isset($this->tJoinmodel_ressources[$oTelechargements->id_ressource])){ echo $this->tJoinmodel_ressources[$oTelechargements->id_ressource];}else{ echo $oTelechargements->id_ressource ;}?></td>
		
		<td><?php echo $oTelechargements->janvier ?></td>
		
		<td><?php echo $oTelechargements->fevrier ?></td>
		
		<td><?php echo $oTelechargements->mars ?></td>
		
		<td><?php echo $oTelechargements->avril ?></td>
		
		<td><?php echo $oTelechargements->mai ?></td>
		
		<td><?php echo $oTelechargements->juin ?></td>
		
		<td><?php echo $oTelechargements->juillet ?></td>
		
		<td><?php echo $oTelechargements->aout ?></td>
		
		<td><?php echo $oTelechargements->septembre ?></td>
		
		<td><?php echo $oTelechargements->octobre ?></td>
		
		<td><?php echo $oTelechargements->novembre ?></td>
		
		<td><?php echo $oTelechargements->decembre ?></td>

		<td><?php echo $oTelechargements->comment ?></td>
		
			<td>
				
				
<a class="btn btn-success" href="<?php echo $this->getLink('telechargements::edit',array(
										'id'=>$oTelechargements->getId()
									) 
							)?>">Edit</a>
			| 
<a class="btn btn-default" href="<?php echo $this->getLink('telechargements::show',array(
										'id'=>$oTelechargements->getId()
									) 
							)?>">Show</a>				
				
			</td>
		</tr>	
		<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="14">Aucune ligne</td>
		</tr>
	<?php endif;?>
</table>
			
