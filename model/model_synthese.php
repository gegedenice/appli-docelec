<?php
class model_synthese extends abstract_model{
	
	protected $sClassRow='row_synthese';
	
	protected $sTable='synthese';
	protected $sTableJointeRessources='ressources';
	protected $sTableJointeDisciplines='disciplines';
	protected $sTableJointeBudget='budget';
	protected $sConfig='pdoMysqlExple';
	
	protected $tId=array('id');

	public static function getInstance(){
		return self::_getInstance(__CLASS__);
	}

	public function findById($uId){
		return $this->findOne('SELECT * FROM '.$this->sTable.' WHERE id=?',$uId );
	}
	public function findAll(){
		return $this->findMany('SELECT * FROM '.$this->sTable);
	}

	public function sumYdtByNiveau(){
		return $this->findMany('SELECT DISTINCT('.$this->sTableJointeRessources.'.niveau) as varNiveau,SUM('.$this->sTable.'.telechargements) as varYdt FROM '.$this->sTable.' JOIN '.$this->sTableJointeRessources.' ON '.$this->sTableJointeRessources.'.id = '.$this->sTable.'.id_ressource GROUP BY '.$this->sTableJointeRessources.'.niveau ORDER BY varYdt DESC');
	}
	/*
    requete sql jointure tables synthese et ressources 
	SELECT DISTINCT(ressources.niveau),SUM(synthese.telechargements) FROM synthese JOIN ressources ON ressources.id = synthese.id_ressource GROUP BY ressources.niveau ;*/
    public function sumYdtByDiscipline(){
		return $this->findMany('SELECT DISTINCT('.$this->sTableJointeDisciplines.'.nom) as varDiscipline,SUM('.$this->sTable.'.telechargements) as varYdt FROM '.$this->sTable.' JOIN '.$this->sTableJointeRessources.' ON '.$this->sTableJointeRessources.'.id = '.$this->sTable.'.id_ressource JOIN '.$this->sTableJointeDisciplines.' ON '.$this->sTableJointeRessources.'.discipline = '.$this->sTableJointeDisciplines.'.id GROUP BY '.$this->sTableJointeRessources.'.discipline ORDER BY varYdt DESC');
	}
	/*
    requete sql double jointure tables synthese, ressources et disciplines
	SELECT DISTINCT(disciplines.nom),SUM(synthese.telechargements) FROM synthese JOIN ressources ON ressources.id = synthese.id_ressource JOIN disciplines ON ressources.discipline = disciplines.id GROUP BY ressources.discipline ;*/

    public function sumPrixByNiveau(){
		return $this->findMany('SELECT DISTINCT('.$this->sTableJointeRessources.'.niveau) as varNiveau,SUM('.$this->sTable.'.prix) as varPrix FROM '.$this->sTable.' JOIN '.$this->sTableJointeRessources.' ON '.$this->sTableJointeRessources.'.id = '.$this->sTable.'.id_ressource GROUP BY '.$this->sTableJointeRessources.'.niveau ORDER BY varPrix DESC');
	}
	/*
    requete sql jointure tables synthese et ressources
	SELECT DISTINCT(ressources.niveau),SUM(synthese.prix) FROM synthese JOIN ressources ON ressources.id = synthese.id_ressource GROUP BY ressources.niveau ;*/

     public function sumPrixByDiscipline(){
		return $this->findMany('SELECT DISTINCT('.$this->sTableJointeDisciplines.'.nom) as varDiscipline,SUM('.$this->sTable.'.prix) as varPrix FROM '.$this->sTable.' JOIN '.$this->sTableJointeRessources.' ON '.$this->sTableJointeRessources.'.id = '.$this->sTable.'.id_ressource JOIN '.$this->sTableJointeDisciplines.' ON '.$this->sTableJointeRessources.'.discipline = '.$this->sTableJointeDisciplines.'.id GROUP BY '.$this->sTableJointeDisciplines.'.nom ORDER BY varPrix DESC');
	}
	/*
    requete sql double jointure tables synthese, ressources et disciplines
	SELECT DISTINCT(disciplines.nom),SUM(synthese.prix) FROM synthese JOIN ressources ON ressources.id = synthese.id_ressource JOIN disciplines ON ressources.discipline = disciplines.id GROUP BY disciplines.nom;*/

	public function findDiff(){
		return $this->findMany('SELECT DISTINCT('.$this->sTableJointeRessources.'.nom) as varRessource,'.$this->sTableJointeBudget.'.prev_prix as varPrevPrix,'.$this->sTableJointeBudget.'.prix as varPrix FROM '.$this->sTableJointeBudget.' JOIN '.$this->sTableJointeRessources.' ON '.$this->sTableJointeRessources.'.id = '.$this->sTableJointeBudget.'.id_ressource');
	}
	/*
    requete sql table budget pour différentiel
	SELECT DISTINCT(ressources.nom),budget.prev_prix,budget.prix FROM budget JOIN ressources ON ressources.id = budget.id_ressource;*/
}

class row_synthese extends abstract_row{
	
	protected $sClassModel='model_synthese';
	
	/*exemple jointure 
	public function findAuteur(){
		return model_auteur::getInstance()->findById($this->auteur_id);
	}
	*/
	/*exemple test validation*/
	private function getCheck(){
		$oPluginValid=new plugin_valid($this->getTab());
		
		
		/* renseigner vos check ici
		$oPluginValid->isEqual('champ','valeurB','Le champ n\est pas &eacute;gal &agrave; '.$valeurB);
		$oPluginValid->isNotEqual('champ','valeurB','Le champ est &eacute;gal &agrave; '.$valeurB);
		$oPluginValid->isUpperThan('champ','valeurB','Le champ n\est pas sup&eacute; &agrave; '.$valeurB);
		$oPluginValid->isUpperOrEqualThan('champ','valeurB','Le champ n\est pas sup&eacute; ou &eacute;gal &agrave; '.$valeurB);
		$oPluginValid->isLowerThan('champ','valeurB','Le champ n\est pas inf&eacute;rieur &agrave; '.$valeurB);
		$oPluginValid->isLowerOrEqualThan('champ','valeurB','Le champ n\est pas inf&eacute;rieur ou &eacute;gal &agrave; '.$valeurB);
		$oPluginValid->isEmpty('champ','Le champ n\'est pas vide');
		$oPluginValid->isNotEmpty('champ','Le champ ne doit pas &ecirc;tre vide');
		$oPluginValid->isEmailValid('champ','L\email est invalide');
		$oPluginValid->matchExpression('champ','/[0-9]/','Le champ n\'est pas au bon format');
		$oPluginValid->notMatchExpression('champ','/[a-zA-Z]/','Le champ ne doit pas &ecirc;tre a ce format');
		*/

		return $oPluginValid;
	}

	public function isValid(){
		return $this->getCheck()->isValid();
	}
	public function getListError(){
		return $this->getCheck()->getListError();
	}
	public function save(){
		if(!$this->isValid()){
			return false;
		}
		parent::save();
		return true;
	}

}
