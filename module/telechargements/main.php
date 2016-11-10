<?php 
class module_telechargements extends abstract_module{
	
	public function before(){
		$this->oLayout=new _layout('bootstrap');
		
		$this->oLayout->addModule('menu','menu::index');
	}
	
	
	public function _index(){
	    //on considere que la page par defaut est la page de listage
	    $this->_list();
	}
	
	
	public function _list(){
		
		$tTelechargements=model_telechargements::getInstance()->findAll();
		
		$oView=new _view('telechargements::list');
		$oView->tTelechargements=$tTelechargements;
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();
		
		$this->oLayout->add('main',$oView);
		 
	}
		
	
	
	public function _new(){
		$tMessage=$this->processSave();
	
		$oTelechargements=new row_telechargements;
		
		$oView=new _view('telechargements::new');
		$oView->oTelechargements=$oTelechargements;
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
			
	
	
	public function _edit(){
		$tMessage=$this->processSave();
		
		$oTelechargements=model_telechargements::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('telechargements::edit');
		$oView->oTelechargements=$oTelechargements;
		$oView->tId=model_telechargements::getInstance()->getIdTab();
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
		
	
	
	public function _show(){
		$oTelechargements=model_telechargements::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('telechargements::show');
		$oView->oTelechargements=$oTelechargements;
		
				$oView->tJoinmodel_ressources=model_ressources::getInstance()->getSelect();

		$this->oLayout->add('main',$oView);
	}
		
	
	
	public function _delete(){
		$tMessage=$this->processDelete();

		$oTelechargements=model_telechargements::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('telechargements::delete');
		$oView->oTelechargements=$oTelechargements;
		
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
			$oTelechargements=new row_telechargements;	
		}else{
			$oTelechargements=model_telechargements::getInstance()->findById( _root::getParam('id',null) );
		}
		
		$tColumn=array('id_ressource','janvier','fevrier','mars','avril','mai','juin','juillet','aout','septembre','octobre','novembre','decembre','comment');
		foreach($tColumn as $sColumn){
			$oTelechargements->$sColumn=_root::getParam($sColumn,null) ;
		}
		
		
		if($oTelechargements->save()){
			//une fois enregistre on redirige (vers la page liste)
			_root::redirect('telechargements::list');
		}else{
			return $oTelechargements->getListError();
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
	
		$oTelechargements=model_telechargements::getInstance()->findById( _root::getParam('id',null) );
				
		$oTelechargements->delete();
		//une fois enregistre on redirige (vers la page liste)
		_root::redirect('telechargements::list');
		
	}
		
	
	public function after(){
		$this->oLayout->show();
	}
	
	
}

