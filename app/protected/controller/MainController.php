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
		// sample object for query
		Doo::loadModel('Post');
		$sample = new Post;
		$sample->id = $this->params['postid'];
		
		// single result from find only when limit=1 specified.
		$post = Doo::db()->find($sample, array('limit'=>1));
		
		/* Direct query is bad practice in DooPHP because of SQL injection risk.
		 * $post = Doo::db()->getOne('Post', array(
		 *    'where' => 'id=' . $this->params['postid']
		 * ));
		 * This way is lessor than prepared statement using PDO directly.
		 */
		
		//render
		$this->render('detail', array(
			'post'=>$post,
		));
    }
}
?>