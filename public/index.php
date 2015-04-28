<?php

use Ovide\Libs\Mvc\Rest\App;

require __DIR__.'/../vendor/autoload.php';


$loader = new \Phalcon\Loader();
//Register dirs
$loader->registerDirs(
		array(
			"./../app/controllers",
			"./../app/models"
		)
)->register();
//Create app
$app = App::instance();
//Set up the database service
$app->di->set('db', function(){
	return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
			"host" => "localhost",
			"username" => "root",
			"password" => "",
			"dbname" => "rest-qcm",
			"options" => array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
			)
	));
});

$app->di->setShared('session', function() {
	$session = new Phalcon\Session\Adapter\Files();
	$session->start();
	return $session;
});
$app->addResources([Domaines::class,Groupes::class,GroupeUtilisateurs::class,Users::class,
		GroupeQuestionnaires::class,Questionnaires::class,Questions::class,Rangs::class,
		Realisations::class,ReponseUtilisateurs::class,Reponses::class]);
/*$app->addResources([Utilisateurs::class]);*/

$app->get("/user/check/{login}/{password}", array(new UsersController(),"checkConnectionAction"));
$app->get("/user/check", array(new UsersController(),"checkConnectedAction"));
$app->post("/user/add", array(new UsersController(),"userAddAction"));
$app->post("/user/connect", array(new UsersController(),"connectAction"));
$app->get("/user/disconnect", array(new UsersController(),"disconnectAction"));
$app->get("/user/exists", array(new UsersController(),"checkUserExistsAction"));

$app->handle();