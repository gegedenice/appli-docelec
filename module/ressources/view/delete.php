<form class="form-horizontal" action="" method="POST">

	
	<div class="form-group">
		<label class="col-sm-2 control-label">Nom</label>
		<div class="col-sm-10"><?php echo $this->oRessources->nom ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Niveau (P/R)</label>
		<div class="col-sm-10"><?php echo $this->oRessources->niveau ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Discipline</label>
		<div class="col-sm-10"><?php if(isset($this->tJoinmodel_disciplines[$this->oRessources->discipline])){ echo $this->tJoinmodel_disciplines[$this->oRessources->discipline];}else{ echo $this->oRessources->discipline ;}?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">url d&#039;acc&egrave;s aux statistiques</label>
		<div class="col-sm-10"><?php echo $this->oRessources->url ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Login</label>
		<div class="col-sm-10"><?php echo $this->oRessources->login ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">et mot de passe</label>
		<div class="col-sm-10"><?php echo $this->oRessources->mdp ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">ou mail</label>
		<div class="col-sm-10"><?php echo $this->oRessources->mail ?></div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Commentaire</label>
		<div class="col-sm-10"><?php echo $this->oRessources->comment ?></div>
	</div>
		



<input type="hidden" name="token" value="<?php echo $this->token?>" />
<?php if($this->tMessage and isset($this->tMessage['token'])): echo $this->tMessage['token']; endif;?>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input class="btn btn-danger" type="submit" value="Confirmer la suppression" /> <a class="btn btn-link" href="<?php echo $this->getLink('ressources::list')?>">Annuler</a>
	</div>
</div>

</form>
