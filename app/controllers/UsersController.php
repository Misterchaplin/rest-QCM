<?php
use Phalcon\Mvc\Controller;
class UsersController extends Controller {
	private $token;
	private function _auth($login,$password){
		$result=false;
		$user=User::findFirst(array(
			"conditions" => "login = ?1",
			"bind"       => array(1 => $login)
		));
		if($user){
			if ($user->getPassword()==$password) {
				$this->token=bin2hex(openssl_random_pseudo_bytes(16));
				$this->session->set("token",$this->token);
				$u=$user->getId();
				$result=$u;
			}
		}
		return $result;
		
	}

	public function userFormAction(){
	}

	public function userAddAction(){
		$this->response->setContentType('application/json', 'utf-8');
		$user=new User();
		$user->setLogin($this->request->getPost());
		$user->setPassword($this->request->getPost());
		if($user->save()){
			$token=bin2hex(openssl_random_pseudo_bytes(16));
			$this->persistent->token = $token;
			echo '{token: "'.$token.'",inserted: true}';
		}else{
			echo "{inserted:false}";
		}
	}
	public function checkUserExistsAction($login){
		$this->response->setContentType('application/json', 'utf-8');
		$user=User::findFirst(array(
				"conditions" => "login = ?1",
				"bind"       => array(1 => $login)
		));
		if($user){
			echo '{exists: true,login: "'.$login.'"}';
		}else{
			echo '{exists: false,login: "'.$login.'"}';
		}
	}
	public function checkConnectionAction($login,$password){
		$this->response->setContentType('application/json', 'utf-8');
		if($this->_auth($login, $password)){
			echo '{token : '.$this->token.',connected: true}';
		}else{
			echo '{connected: false}';
		}
	}

	public function checkConnectedAction(){
		$this->response->setContentType('application/json', 'utf-8');
		if($this->session->has("token")){
			echo '{token : '.$this->session->get("token").',connected: true}';
		}else{
			echo '{connected: false}';
		}
	}

	public function connectAction(){
		$login=$this->request->getPost("login");
		$password=$this->request->getPost("password");
		$checkConnect=$this->_auth($login, $password);
		if($checkConnect!=false){
			echo '{token : '.$this->token.',connected: true, who: '.$checkConnect.'}';
		}else{
			echo '{connected: false}';
		}
	}

	public function disconnectAction(){
		$this->response->setContentType('application/json', 'utf-8');
		$this->session->destroy();
		echo '{connected: false}';
	}
}