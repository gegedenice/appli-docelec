<?php 
class module_disciplines extends abstract_module{
	
	public function before(){
		$this->oLayout=new _layout('bootstrap');
		
		$this->oLayout->addModule('menu','menu::index');
	}
	
	
	public function _index(){
	    //on considere que la page par defaut est la page de listage
	    $this->_list();
	}
	
	
	public function _list(){
		
		$tDisciplines=model_disciplines::getInstance()->findAll();
		
		$oView=new _view('disciplines::list');
		$oView->tDisciplines=$tDisciplines;
		
		
		
		$this->oLayout->add('main',$oView);
		 
	}
		
	
	
	public function _new(){
		$tMessage=$this->processSave();
	
		$oDisciplines=new row_disciplines;
		
		$oView=new _view('disciplines::new');
		$oView->oDisciplines=$oDisciplines;
		
		
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
			
	
	
	public function _edit(){
		$tMessage=$this->processSave();
		
		$oDisciplines=model_disciplines::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('disciplines::edit');
		$oView->oDisciplines=$oDisciplines;
		$oView->tId=model_disciplines::getInstance()->getIdTab();
		
		
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
		
	
	
	
	
	public function _delete(){
		$tMessage=$this->processDelete();

		$oDisciplines=model_disciplines::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('disciplines::delete');
		$oView->oDisciplines=$oDisciplines;
		
		

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
			$oDisciplines=new row_disciplines;	
		}else{
			$oDisciplines=model_disciplines::getInstance()->findById( _root::getParam('id',null) );
		}
		
		$tColumn=array('nom');
		foreach($tColumn as $sColumn){
			$oDisciplines->$sColumn=_root::getParam($sColumn,null) ;
		}
		
		
		if($oDisciplines->save()){
			//une fois enregistre on redirige (vers la page liste)
			_root::redirect('disciplines::list');
		}else{
			return $oDisciplines->getListError();
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
	
		$oDisciplines=model_disciplines::getInstance()->findById( _root::getParam('id',null) );
				
		$oDisciplines->delete();
		//une fois enregistre on redirige (vers la page liste)
		_root::redirect('disciplines::list');
		
	}
		
	
	public function after(){
		$this->oLayout->show();
	}
	
	
}

