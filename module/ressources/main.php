<?php 
class module_ressources extends abstract_module{
	
	public function before(){
		$this->oLayout=new _layout('bootstrap');
		
		$this->oLayout->addModule('menu','menu::index');
	}
	
	
	public function _index(){
	    //on considere que la page par defaut est la page de listage
	    $this->_list();
	}
	
	
	public function _list(){
		
		$tRessources=model_ressources::getInstance()->findAll();
		
		$oView=new _view('ressources::list');
		$oView->tRessources=$tRessources;
		
				$oView->tJoinmodel_disciplines=model_disciplines::getInstance()->getSelect();
		
		$this->oLayout->add('main',$oView);
		 
	}
		
	
	
	public function _new(){
		$tMessage=$this->processSave();
	
		$oRessources=new row_ressources;
		
		$oView=new _view('ressources::new');
		$oView->oRessources=$oRessources;
		
				$oView->tJoinmodel_disciplines=model_disciplines::getInstance()->getSelect();
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
			
	
	
	public function _edit(){
		$tMessage=$this->processSave();
		
		$oRessources=model_ressources::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('ressources::edit');
		$oView->oRessources=$oRessources;
		$oView->tId=model_ressources::getInstance()->getIdTab();
		
				$oView->tJoinmodel_disciplines=model_disciplines::getInstance()->getSelect();
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
		
	
	
	
	
	public function _delete(){
		$tMessage=$this->processDelete();

		$oRessources=model_ressources::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('ressources::delete');
		$oView->oRessources=$oRessources;
		
				$oView->tJoinmodel_disciplines=model_disciplines::getInstance()->getSelect();

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
			$oRessources=new row_ressources;	
		}else{
			$oRessources=model_ressources::getInstance()->findById( _root::getParam('id',null) );
		}
		
		$tColumn=array('nom','niveau','discipline','url','login','mdp','mail','comment');
		foreach($tColumn as $sColumn){
			$oRessources->$sColumn=_root::getParam($sColumn,null) ;
		}
		
		
		if($oRessources->save()){
			//une fois enregistre on redirige (vers la page liste)
			_root::redirect('ressources::list');
		}else{
			return $oRessources->getListError();
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
	
		$oRessources=model_ressources::getInstance()->findById( _root::getParam('id',null) );
				
		$oRessources->delete();
		//une fois enregistre on redirige (vers la page liste)
		_root::redirect('ressources::list');
		
	}
		
	
	public function after(){
		$this->oLayout->show();
	}
	
	
}

