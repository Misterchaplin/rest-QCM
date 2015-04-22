<?php
use Phalcon\Mvc\Model;
class User extends Model {
	protected $id;
	protected $login;
	protected $nom;
	protected $prenom;
	protected $password;
	protected $rang_id;
	protected $salt;
	
	/*public function initialize()
	{
		$this->hasManyToMany(
				"id",
				"GroupeUtilisateur",
				"utilisateur_id", "groupe_id",
				"Groupe",
				"id"
		);
		 
	}*/
	
	public function beforeCreate(){
		$this->salt = uniqid(mt_rand(), true);
		$this->password=crypt($this->password,$this->salt);
	}
	public function getSource(){
		return "utilisateur";
	}
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getLogin() {
		return $this->login;
	}
	public function setLogin($login) {
		$this->login = $login;
		return $this;
	}
	public function getNom() {
		return $this->nom;
	}
	public function setNom($nom) {
		$this->nom = $nom;
		return $this;
	}
	public function getPrenom() {
		return $this->prenom;
	}
	public function setPrenom($prenom) {
		$this->prenom = $prenom;
		return $this;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}
	public function getRangId() {
		return $this->rang_id;
	}
	public function setRangId($rang_id) {
		$this->rang_id = $rang_id;
		return $this;
	}
	public function getSalt() {
		return $this->salt;
	}
	public function setSalt($salt) {
		$this->salt = $salt;
		return $this;
	}
	

}