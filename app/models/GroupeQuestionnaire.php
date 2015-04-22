<?php
use Phalcon\Mvc\Model;
class GroupeQuestionnaire extends Model{
    protected $id;
	protected $questionnaire_id;
	protected $groupe_id;
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getQuestionnaireId() {
		return $this->questionnaire_id;
	}
	public function setQuestionnaireId($questionnaire_id) {
		$this->questionnaire_id = $questionnaire_id;
		return $this;
	}
	public function getGroupeId() {
		return $this->groupe_id;
	}
	public function setGroupeId($groupe_id) {
		$this->groupe_id = $groupe_id;
		return $this;
	}
	
		
	
}