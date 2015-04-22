<?php
use Ovide\Libs\Mvc\Rest\Controller;
use Ovide\Libs\Mvc\Rest\Exception\NotFound;

class Questionnaires extends CBase {
	public function onConstruct() {
		parent::onConstruct ();
		$this->modelclass = Questionnaire::class;
	}
	
	protected function setObject($model, $obj) {
		$model->setLibelle ( $obj ["libelle"] );
		//$model->setIdDomaine ( $obj ["idDomaine"] );
		//$model->setIdQuestionnaire ( $obj ["idQuestionnaire"] );
		$model->setDate ( $obj ["date"] );
	}
	
	public function toString() {
		return $this->getLibelle ();
	}
	
	public function getQcmWithLibelle($param){
	
		$questionnaires = Questionnaire::find(array(
				"libelle = '$param'"
	
		));
		$questionnaires=$questionnaires->toArray();
		if(sizeof($questionnaires)==0)
			throw new NotFound("Aucun questionnaire trouvé pour le groupe.");
		return $questionnaires;
	
	}
	
	public function getGroupe($param){
		if($param){
			$questionnaires=Questionnaire::find("id=".$param);
			foreach ($questionnaires as $q){
				$groupes=$q->getGroupes();
			}
			$groupes=$groupes->toArray();
		}
		
		if(sizeof($groupes)==0 )
			throw new NotFound("Aucun questionnaire trouvé pour le groupe.");
		return $groupes;
	}
	
	public function getUtilisateur($param){
		if($param){
			$realisation=Realisation::find("questionnaire_id=".$param);
			/*foreach ($realisation as $r){
				var_dump($realisation);
				$users=$r->getUtilisateurs();
			}*/
			$users=$realisation->toArray();
				
		}
	
		if(sizeof($users)==0)
			throw new NotFound("Aucune réalisation trouvée.");
		return $users;
	}
	
}