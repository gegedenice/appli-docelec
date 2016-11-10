<?php 
$oForm=new plugin_form($this->oBudget);
$oForm->setMessage($this->tMessage);
?>
<input id=calculer" type="submit" class="btn btn-success" value="Calculer" onclick=""/>
<form class="form-horizontal" action="" method="POST" >
<!--prévisions -->
<div class="col-md-6">
  <div class="panel panel-primary">
  <div class="panel-heading">Prévisions</div>
    <div class="panel-body">
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Ressource</label>
		<div class="col-sm-10"><?php echo $oForm->getSelect('id_ressource',$this->tJoinmodel_ressources,array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Prix en devise</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prev_prix_devise_ht',array('id'=>'prev_prix_devise','class'=>'form-control','onblur'=>'majPrevCalculChange();majPrevCalculTva();majPrevCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Taux de change</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prev_taux_change',array('id'=>'prev_taux_change','class'=>'form-control','onblur'=>'majPrevCalculChange();majPrevCalculTva();majPrevCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Prix en euros HT</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prev_prix_euro_ht',array('id'=>'prev_prix_euro_ht','class'=>'form-control','onblur'=>'majPrevCalculTva();majPrevCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Taux de TVA</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prev_taux_tva',array('id'=>'prev_taux_tva','class'=>'form-control','onblur'=>'majPrevCalculTva();majPrevCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Prix TTC</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prev_prix_ttc',array('id'=>'prev_prix_ttc','class'=>'form-control','onblur'=>'majPrevCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Taux de r&eacute;cup&eacute;ration TVA (TVA mixte)</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prev_taux_recup_tva',array('id'=>'prev_taux_recup_tva','class'=>'form-control','onblur'=>'majPrevCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Prix final</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prev_prix',array('id'=>'prev_prix_final','class'=>'form-control')) ?></div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Commentaire</label>
		<div class="col-sm-10"><?php echo $oForm->getInputTextarea('prev_comment',array('class'=>'form-control')) ?></div>
	</div>	
	
<?php echo $oForm->getToken('token',$this->token)?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" class="btn btn-primary" value="Modifier" /> <a class="btn btn-link" href="<?php echo $this->getLink('budget::list')?>">Annuler</a>
	</div>
</div>
</div>
</div>
</div>

<!--exécution -->
<div class="col-md-6">
  <div class="panel panel-primary">
  <div class="panel-heading">Exécution</div>
    <div class="panel-body">
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Ressource</label>
		<div class="col-sm-10"><?php echo $oForm->getSelect('id_ressource',$this->tJoinmodel_ressources,array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Prix en devise</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prix_devise_ht',array('id'=>'prix_devise','class'=>'form-control','onblur'=>'majCalculChange();majCalculTva();majCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Taux de change</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('taux_change',array('id'=>'taux_change','class'=>'form-control','onblur'=>'majCalculChange();majCalculTva();majCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Prix en euros HT</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prix_euro_ht',array('id'=>'prix_euro_ht','class'=>'form-control','onblur'=>'majCalculTva();majCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Taux de TVA</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('taux_tva',array('id'=>'taux_tva','class'=>'form-control','onblur'=>'majCalculTva();majCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Prix TTC</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prix_ttc',array('id'=>'prix_ttc','class'=>'form-control','onblur'=>'majCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Taux de r&eacute;cup&eacute;ration TVA (TVA mixte)</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('taux_recup_tva',array('id'=>'taux_recup_tva','class'=>'form-control','onblur'=>'majCalculTvaRecup();')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Prix final</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prix',array('id'=>'prix_final','class'=>'form-control')) ?></div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Commentaire</label>
		<div class="col-sm-10"><?php echo $oForm->getInputTextarea('comment',array('class'=>'form-control')) ?></div>
	</div>	
	
<?php echo $oForm->getToken('token',$this->token)?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" class="btn btn-primary" value="Modifier" /> <a class="btn btn-link" href="<?php echo $this->getLink('budget::list')?>">Annuler</a>
	</div>
</div>
</div>
</div>
</div>
</form>
