<?php
use Ovide\Libs\Mvc\Rest\Controller;
use Ovide\Libs\Mvc\Rest\Exception\NotFound;

class Realisations extends CBase {
	public function onConstruct() {
		parent::onConstruct ();
		$this->modelclass = Realisation::class;
	}
	
	protected function setObject($model, $obj) {
		$model->setLibelle ( $obj ["libelle"] );
		$model->setIdUtilisateur ( $obj ["idUtilisateur"] );
		$model->setDate ( $obj ["date"] );
		$model->setIdQuestionnaire ( $obj ["idQuestionnaire"] );
	}
	
	public function toString() {
		return $this->getLibelle ();
	}
	
	
	
	public function getScore($param){
		
		if($param!=null){
			$tab=explode("_", $param);
			$realisation = Realisation::find("utilisateur_id =".$tab[1]." AND questionnaire_id =".$tab[0]."");
			
			//var_dump($questionnaires);
			$realisation=$realisation->toArray();
			if(sizeof($realisation)==0)
				$realisation=null;
			return $realisation;
		}
		
	}
	
	public function getRealisationWithQuestionnaire($param){
		if($param!=null){
			$realisation = Realisation::find("questionnaire_id =".$param);
				
			//var_dump($questionnaires);
			$realisation=$realisation->toArray();
			if(sizeof($realisation)==0)
				$realisation=null;
			return $realisation;
		}
		
	}
	
	
}