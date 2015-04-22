<?php
use Ovide\Libs\Mvc\Rest\Controller;
use Ovide\Libs\Mvc\Rest\Exception\NotFound;

class Groupes extends CBase {
	public function onConstruct() {
		parent::onConstruct ();
		$this->modelclass = Groupe::class;
	}
	
	protected function setObject($model, $obj) {
		$model->setLibelle ( $obj ["libelle"] );
		$model->setCode ( $obj ["code"] );
	}
	
	public function toString() {
		return $this->getLibelle ();
	}
	
	public function getUtilisateur($param){
		if($param){
			$groupes=Groupe::find("id=".$param);
			foreach ($groupes as $g){
				$users=$g->getUtilisateurs();
			}
			$users=$users->toArray();
		}
		
		if(sizeof($users)==0)
			throw new NotFound("Aucun utilisateur trouvé pour le groupe.");
		return $users;
	}
}