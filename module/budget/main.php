<?php 
class module_budget extends abstract_module{
	
	public function before(){
		$this->oLayout=new _layout('bootstrap');
		
		$this->oLayout->addModule('menu','menu::index');
	}
	
	
	public function _index(){
	    //on considere que la page par defaut est la page de listage
	    $this->_list();
	}
	
	
	public function _list(){
		
		$tBudget=model_budget::getInstance()->findAll();
		
		$oView=new _view('budget::list');
		$oView->tBudget=$tBudget;
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();
		
		$this->oLayout->add('main',$oView);
		 
	}
		
	
	
	public function _new(){
		$tMessage=$this->processSave();
	
		$oBudget=new row_budget;
		
		$oView=new _view('budget::new');
		$oView->oBudget=$oBudget;
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
			
	
	
	public function _edit(){
		$tMessage=$this->processSave();
		
		$oBudget=model_budget::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('budget::edit');
		$oView->oBudget=$oBudget;
		$oView->tId=model_budget::getInstance()->getIdTab();
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
	
	
	public function _delete(){
		$tMessage=$this->processDelete();

		$oBudget=model_budget::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('budget::delete');
		$oView->oBudget=$oBudget;
		
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
			$oBudget=new row_budget;	
		}else{
			$oBudget=model_budget::getInstance()->findById( _root::getParam('id',null) );
		}
		
		$tColumn=array('id_ressource','prev_prix_devise_ht','prix_devise_ht','prev_taux_change','taux_change','prev_prix_euro_ht','prix_euro_ht','prev_taux_tva','taux_tva','prev_prix_ttc','prix_ttc','prev_taux_recup_tva','taux_recup_tva','prev_prix','prix','prev_comment','comment');
		foreach($tColumn as $sColumn){
			$oBudget->$sColumn=_root::getParam($sColumn,null) ;
		}

		if($oBudget->save()){
			//une fois enregistre on redirige (vers la page liste)
			_root::redirect('budget::list');
		}else{
			return $oBudget->getListError();
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
	
		$oBudget=model_budget::getInstance()->findById( _root::getParam('id',null) );
				
		$oBudget->delete();
		//une fois enregistre on redirige (vers la page liste)
		_root::redirect('budget::list');
		
	}
		
	
	public function after(){
		$this->oLayout->show();
	}
	
	
}

