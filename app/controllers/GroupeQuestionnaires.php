<?php
use Ovide\Libs\Mvc\Rest\Controller;
use Ovide\Libs\Mvc\Rest\Exception\NotFound;

class GroupeQuestionnaires extends \CBase {
	public function onConstruct() {
		parent::onConstruct ();
		$this->modelclass = GroupeQuestionnaire::class;
	}
	
	protected function setObject($model, $obj) {
		$model->setQuestionnaire_id ( $obj ["questionnaire_id"] );
		$model->setGroupe_id ( $obj ["groupe_id"] );
	}
	
	
	
	/*public function initialize()
	{
		$this->belongsTo('questionnaire_id', 'Questionnaire', 'id', array(
				'alias' => 'questionnaire'
		));
		$this->belongsTo('groupe_id', 'Groupe', 'id', array(
				'alias' => 'groupe'
		));
	}*/
	
	public function getGrpQst($param){
	
		$t=explode("_", $param);
		$questionnaires = GroupeQuestionnaire::find("groupe_id =".$t[1]." AND questionnaire_id =".$t[0]."");
	
		//var_dump($questionnaires);
		$questionnaires=$questionnaires->toArray();
	
		return $questionnaires;
	}
	
	
	public function getVerifPlusieursGroupe($param){
		
		$t=explode("_", $param);
		$questionnaires = GroupeQuestionnaire::find("questionnaire_id =".$t[0]);
		$questionnaires=$questionnaires->toArray();
	
		return $questionnaires;
	
	}
	
	public function getGroupeByQuestionnaire($param){
		if($param){
			$groupQuestionnaire=GroupeQuestionnaire::find("questionnaire_id=".$param);
			$groupQuestionnaire=$groupQuestionnaire->toArray();
		}
		
		if(sizeof($groupQuestionnaire)==0)
			throw new NotFound("Aucun questionnaire trouvée.");
		return $groupQuestionnaire;
	}
}