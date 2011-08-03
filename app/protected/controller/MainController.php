<?php
/**
 * MainController
 */
class MainController extends DooController{

	public function index(){
		$this->render('index', array(
			'posts'=>Doo::db()->find('Post', array(
				'limit'=>20
			)),
		));
    }

	public function detail(){
		$this->render('detail', array(
			'post'=>Doo::db()->getOne('Post', array(
				'where'=>$this->params['postid'],
			)),
		));
    }
}
?>