<table class="table table-striped">
	<tr>
		
		<th>Discipline</th>
		
		<th></th>
	</tr>
	<?php if($this->tDisciplines):?>
		<?php foreach($this->tDisciplines as $oDisciplines):?>
		<tr <?php echo plugin_tpl::alternate(array('','class="alt"'))?>>
			
		<td><?php echo $oDisciplines->nom ?></td>
		
			<td>
				
				
<a class="btn btn-success" href="<?php echo $this->getLink('disciplines::edit',array(
										'id'=>$oDisciplines->getId()
									) 
							)?>">Edit</a>
			| 
<a class="btn btn-danger" href="<?php echo $this->getLink('disciplines::delete',array(
										'id'=>$oDisciplines->getId()
									) 
							)?>">Delete</a>
			
				
				
			</td>
		</tr>	
		<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="2">Aucune ligne</td>
		</tr>
	<?php endif;?>
</table>

<p><a class="btn btn-primary" href="<?php echo $this->getLink('disciplines::new') ?>">New</a></p>
			
