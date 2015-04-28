<?php
use Ovide\Libs\Mvc\Rest\Controller;
use Ovide\Libs\Mvc\Rest\Exception\NotFound;

class GroupeUtilisateurs extends CBase {
	public function onConstruct() {
		parent::onConstruct ();
		$this->modelclass = GroupeUtilisateur::class;
	}
	
	protected function setObject($model, $obj) {
		$model->setIdUtilisateur ( $obj ["utilisateur_id"] );
		$model->setIdGroupe ( $obj ["groupe_id"] );
	}
	
	public function toString() {
		return $this->getLibelle ();
	}
	
	public function getUser($param){
	
		$utilisateurs = GroupeUtilisateur::find('utilisateur_id = '.$param);
		//	var_dump($questionnaires);
		$utilisateurs=$utilisateurs->toArray();
	
		if(sizeof($utilisateurs)==0)
			throw new NotFound("Aucun questionnaire trouvé pour le groupe.");
		return $utilisateurs;
	}
}