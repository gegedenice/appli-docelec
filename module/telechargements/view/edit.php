<?php 
$oForm=new plugin_form($this->oTelechargements);
$oForm->setMessage($this->tMessage);
?>
<form class="form-horizontal" action="" method="POST" >
	
	<div class="form-group">
		<label class="col-sm-2 control-label">id_ressource</label>
		<div class="col-sm-10"><?php echo $oForm->getSelect('id_ressource',$this->tJoinmodel_ressources,array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Janvier</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('janvier',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">F&eacute;vrier</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('fevrier',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Mars</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('mars',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Avril</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('avril',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Mai</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('mai',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Juin</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('juin',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Juillet</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('juillet',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Ao&ucirc;t</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('aout',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Septembre</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('septembre',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Octobre</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('octobre',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Novembre</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('novembre',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">D&eacute;cembre</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('decembre',array('class'=>'form-control')) ?></div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Commentaire</label>
		<div class="col-sm-10"><?php echo $oForm->getInputTextarea('comment',array('class'=>'form-control')) ?></div>
	</div>
		
	
	

<?php echo $oForm->getToken('token',$this->token)?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" class="btn btn-success" value="Modifier" /> <a class="btn btn-link" href="<?php echo $this->getLink('telechargements::list')?>">Annuler</a>
	</div>
</div>
</form>

