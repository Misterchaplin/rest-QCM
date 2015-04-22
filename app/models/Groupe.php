<?php
use Phalcon\Mvc\Model;
class Groupe extends Model {
	protected $id;
	protected $libelle;
	protected $code;
	
	public function initialize()
	{
		/*$this->hasManyToMany(
				"id",
				"GroupeQuestionnaire",
				"groupe_id", "questionnaire_id",
				"Questionnaire",
				"id"
		);*/
		
		$this->hasManyToMany(
    			"id",
    			"GroupeUtilisateur",
    			"groupe_id",
    			"utilisateur_id",
    			"Utilisateur",
    			"id",
    			array('alias' => 'utilisateurs')
    	);
	}
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	public function getLibelle() {
		return $this->libelle;
	}
	public function setLibelle($libelle) {
		$this->libelle = $libelle;
		return $this;
	}
	public function getCode() {
		return $this->code;
	}
	public function setCode($code) {
		$this->code = $code;
		return $this;
	}
	
}