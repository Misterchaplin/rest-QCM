<?php
use Phalcon\Mvc\Model;
class Questionnaire extends Model {
	protected $id;
	protected $libelle;
	protected $idDomaine;
	protected $date;

 public function initialize()
    {
        /*$this->hasManyToMany(
            "id",
            "Realisation",
        	"questionnaire_id",
            "utilisateur_id",
            "Utilisateur",
            "id",
        	array('alias' => 'utilisateurs')
        );*/
    	$this->hasManyToMany(
    			"id",
    			"GroupeQuestionnaire",
    			"questionnaire_id",
    			"groupe_id",
    			"Groupe",
    			"id",
    			array('alias' => 'groupes')
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

	public function getDate() {
		return $this->date;
	}
	public function setDate($date) {
		$this->date = $date;
		return $this;
	}
	public function getIdDomaine() {
		return $this->idDomaine;
	}
	public function setIdDomaine($idDomaine) {
		$this->idDomaine = $idDomaine;
		return $this;
	}
// 	public function getIdQuestionnaire() {
// 		return $this->idQuestionnaire;
// 	}
// 	public function setIdQuestionnaire($idQuestionnaire) {
// 		$this->idQuestionnaire = $idQuestionnaire;
// 		return $this;
// 	}





}