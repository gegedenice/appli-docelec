<?php 
$oForm=new plugin_form($this->oRessources);
$oForm->setMessage($this->tMessage);
?>
<form class="form-horizontal" action="" method="POST" >

	
	<div class="form-group">
		<label class="col-sm-2 control-label">Nom</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('nom',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Niveau (P/R)</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('niveau',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Discipline</label>
		<div class="col-sm-10"><?php echo $oForm->getSelect('discipline',$this->tJoinmodel_disciplines,array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">url d&#039;acc&egrave;s aux statistiques</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('url',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Login</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('login',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">et mot de passe</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('mdp',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">ou mail</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('mail',array('class'=>'form-control')) ?></div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Commentaire</label>
		<div class="col-sm-10"><?php echo $oForm->getInputTextarea('comment',array('class'=>'form-control')) ?></div>
	</div>
		
	

<?php echo $oForm->getToken('token',$this->token)?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" class="btn btn-success" value="Ajouter" /> <a class="btn btn-link" href="<?php echo $this->getLink('ressources::list')?>">Annuler</a>
	</div>
</div>
</form>
