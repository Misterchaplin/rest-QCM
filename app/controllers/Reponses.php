<?php
use Ovide\Libs\Mvc\Rest\Controller;
use Ovide\Libs\Mvc\Rest\Exception\NotFound;

class Reponses extends CBase {
	public function onConstruct() {
		parent::onConstruct ();
		$this->modelclass = Reponse::class;
	}
	
	protected function setObject($model, $obj) {
		$model->setLibelle ( $obj ["libelle"] );
		$model->setGood ( $obj ["good"] );
		$model->setIdQuestion ( $obj ["question_id"] );
	}
	
	public function toString() {
		return $this->getLibelle ();
	}
	
	public function getReponseByQuestion($param){
		if($param){
			$reponse=Reponse::find("question_id=".$param);
			$reponse=$reponse->toArray();
		}
		
		if(sizeof($reponse)==0)
			throw new NotFound("Aucune question trouvée.");
		return $reponse;
	}
}