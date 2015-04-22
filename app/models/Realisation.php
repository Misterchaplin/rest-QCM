<?php
use Phalcon\Mvc\Model;
class Realisation extends Model {
	protected $id;
	protected $utilisateur_id;
	protected $questionnaire_id;
	protected $date;
	
	
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	
	
	public function getDate() {
		return $this->date;
	}
	public function setDate($date) {
		$this->date = $date;
		return $this;
	}
	public function getUtilisateurId() {
		return $this->utilisateur_id;
	}
	public function setUtilisateurId($utilisateur_id) {
		$this->utilisateur_id = $utilisateur_id;
		return $this;
	}
	public function getQuestionnaireId() {
		return $this->questionnaire_id;
	}
	public function setQuestionnaireId($questionnaire_id) {
		$this->questionnaire_id = $questionnaire_id;
		return $this;
	}
	
}