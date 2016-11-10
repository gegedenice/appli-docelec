<?php
Class module_menu extends abstract_moduleembedded{
		
	public function _index(){
		
		$tLink=array(
			'Disciplines (admin)' => 'disciplines::index',
            'Ressources (admin)' => 'ressources::index',
			'Coût par ressource' => 'budget::index',
			'T&eacute;l&eacute;chargements par ressource' => 'telechargements::index',
            'Tableau de bord' => 'synthese::index',
		);
		
		$oView=new _view('menu::index');
		$oView->tLink=$tLink;
		
		return $oView;
	}
}
