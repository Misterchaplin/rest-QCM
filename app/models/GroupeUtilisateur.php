<?php
use Phalcon\Mvc\Model;
class GroupeUtilisateur extends Model {
	protected $utilisateur_id;
	protected $groupe_id;
	

	
	public function getUtilisateurId() {
		return $this->utilisateur_id;
	}
	public function setUtilisateurId($utilisateur_id) {
		$this->utilisateur_id = $utilisateur_id;
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