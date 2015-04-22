<?php
use Ovide\Libs\Mvc\Rest\Controller;
use Ovide\Libs\Mvc\Rest\Exception\NotFound;

class Questions extends CBase {
	public function onConstruct() {
		parent::onConstruct ();
		$this->modelclass = Question::class;
	}
	
	protected function setObject($model, $obj) {
		$model->setLibelle ( $obj ["libelle"] );
		$model->setIdQuestionnaire ( $obj ["questionnaire_id"] );
	}
	
	public function toString() {
		return $this->getLibelle ();
	}
	
	public function getQuestionByQuestionnaire($param){
		if($param){
			$question=Question::find("questionnaire_id=".$param);
			$question=$question->toArray();
		}
		
		if(sizeof($question)==0)
			throw new NotFound("Aucune question trouvée.");
		return $question;
	}
}