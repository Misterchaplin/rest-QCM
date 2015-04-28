<?php
use Ovide\Libs\Mvc\Rest\Controller;
use Ovide\Libs\Mvc\Rest\Exception\NotFound;

class Users extends CBase{
	public function onConstruct() {
		parent::onConstruct ();
		$this->modelclass = Utilisateur::class;
	}
	
	protected function setObject($model, $obj) {
		$model->setLogin ( $obj ["login"] );
		$model->setPassword ( $obj ["password"] );
		$model->setNom ( $obj ["nom"] );
		$model->setPrenom ( $obj ["prenom"] );
		$model->setIdIrang ( $obj ["idIrang"] );
	}
	
	public function toString() {
		return $this->getLogin ();
	}
	
	public function getQuestionnaireByUser($param){
		if($param){
			/*$user=Utilisateur::find("id=".$param);		
			foreach ($user as $u){
				$groupes=$u->getGroupes();
				/*foreach ($groupes as $g){
					$qu=$g->getQuestionnaires();
					foreach ($qu as $q){
						if($q->getId()!=null){
							echo"la";
							//var_dump($q->getLibelle());
							$quest= $qu;
						}
						else{
							echo "vide";
						}
					}
				}	*/	
			/*}
			$groupes=$groupes->toArray();	*/
			$questionnaires=Questionnaire::find("id=".$param);
			foreach ($questionnaires as $q){
				$groupes=$q->getGroupes();
				foreach ($groupes as $g){
				
					$go=$g->getUtilisateurs();
					foreach ($go as $v){
						if($v->getId()==7){
							$quest=$questionnaires;
						}
					}
				}
			}
			$quest=$quest->toArray();
		}
	
		if(sizeof($quest)==0 )
			throw new NotFound("Aucun questionnaire trouvé pour l'utilisateur.");
		return $quest;
	}
	
	
}