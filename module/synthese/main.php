<?php 
class module_synthese extends abstract_module{
	
	public function before(){
		$this->oLayout=new _layout('bootstrap');
		
		$this->oLayout->addModule('menu','menu::index');
	}
	
	
	public function _index(){
	    //on considere que la page par defaut est la page de listage
	    $this->_list();
	}
	
	
	public function _list(){
		
		$tSynthese=model_synthese::getInstance()->findAll();
		
		$oView=new _view('synthese::list');
		$oView->tSynthese=$tSynthese;
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();

		$this->oLayout->add('main',$oView);	

	}

	public function _excel(){

		 $tItem=model_synthese::getInstance()->findAll();

   $oView=new _view('synthese::excel');
   $oView->tItem=$tItem;
   $oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();
   //$this->oLayout ayant ete initialis�e dans la methode before
   $this->oLayout->add('main',$oView);
   $this->oLayout->setLayout('download');
   $this->oLayout->sFileName='export';
   $this->oLayout->sExtension='csv';
  
   $this->oLayout->show();
   exit;

	}
		
	public function _graph(){
		
		$tSynthese=model_synthese::getInstance()->findAll();
		
		$oView=new _view('synthese::graph');
		$oView->tSynthese=$tSynthese;
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();
        
        //ajout pour requete jointée niveau/ydt
		$aSynthese=model_synthese::getInstance()->sumYdtByNiveau();
		$oView->aSynthese=$aSynthese;	

		//ajout pour requete jointée discipline/ydt
		$bSynthese=model_synthese::getInstance()->sumYdtByDiscipline();
		$oView->bSynthese=$bSynthese;	

		//ajout pour requete jointée niveau/prix
		$cSynthese=model_synthese::getInstance()->sumPrixByNiveau();
		$oView->cSynthese=$cSynthese;

		//ajout pour requete jointée discipline/prix
		$dSynthese=model_synthese::getInstance()->sumPrixByDiscipline();
		$oView->dSynthese=$dSynthese;	
        
        //ajout pour requete jointée différentiel
		$eSynthese=model_synthese::getInstance()->findDiff();
		$oView->eSynthese=$eSynthese;

		$this->oLayout->add('main',$oView);		

	}
	
	public function _new(){
		$tMessage=$this->processSave();
	
		$oSynthese=new row_synthese;
		
		$oView=new _view('synthese::new');
		$oView->oSynthese=$oSynthese;
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
			
	
	
	public function _edit(){
		$tMessage=$this->processSave();
		
		$oSynthese=model_synthese::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('synthese::edit');
		$oView->oSynthese=$oSynthese;
		$oView->tId=model_synthese::getInstance()->getIdTab();
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
		
	
	
	
	
	public function _delete(){
		$tMessage=$this->processDelete();

		$oSynthese=model_synthese::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('synthese::delete');
		$oView->oSynthese=$oSynthese;
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();

		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
		
	

	private function processSave(){
		if(!_root::getRequest()->isPost() ){ //si ce n'est pas une requete POST on ne soumet pas
			return null;
		}
		
		$oPluginXsrf=new plugin_xsrf();
		if(!$oPluginXsrf->checkToken( _root::getParam('token') ) ){ //on verifie que le token est valide
			return array('token'=>$oPluginXsrf->getMessage() );
		}
	
		$iId=_root::getParam('id',null);
		if($iId==null){
			$oSynthese=new row_synthese;	
		}else{
			$oSynthese=model_synthese::getInstance()->findById( _root::getParam('id',null) );
		}
		
		$tColumn=array('id_ressource','prix','diff_prev','telechargements','ratio_prix_telechargement');
		foreach($tColumn as $sColumn){
			$oSynthese->$sColumn=_root::getParam($sColumn,null) ;
		}
		
		
		if($oSynthese->save()){
			//une fois enregistre on redirige (vers la page liste)
			_root::redirect('synthese::list');
		}else{
			return $oSynthese->getListError();
		}
		
	}
	
	
	public function processDelete(){
		if(!_root::getRequest()->isPost() ){ //si ce n'est pas une requete POST on ne soumet pas
			return null;
		}
		
		$oPluginXsrf=new plugin_xsrf();
		if(!$oPluginXsrf->checkToken( _root::getParam('token') ) ){ //on verifie que le token est valide
			return array('token'=>$oPluginXsrf->getMessage() );
		}
	
		$oSynthese=model_synthese::getInstance()->findById( _root::getParam('id',null) );
				
		$oSynthese->delete();
		//une fois enregistre on redirige (vers la page liste)
		_root::redirect('synthese::list');
		
	}
		
	
	public function after(){
		$this->oLayout->show();
	}
	
	
}

