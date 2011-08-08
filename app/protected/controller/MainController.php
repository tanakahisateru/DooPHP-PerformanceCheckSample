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

	/**
	 *	immediate query
	 */
	public function immediate()
	{
		$post = Doo::db()->getOne('Post', array(
			'where' => 'id=?',
			'param' => array($this->params['postid']),
		));
		//render
		$this->render('detail', array(
			'post'=>$post,
		));
	}
	
	/**
	 *	sample object based query
	 */
	public function sample()
	{
		Doo::loadModel('Post');
		
		// sample object for query
		$sample = new Post;
		$sample->id = $this->params['postid'];
		
		// single result from find only when limit=1 specified.
		$post = Doo::db()->find($sample, array('limit'=>1));
		
		//render
		$this->render('detail', array(
			'post'=>$post,
		));
	}
	
	/**
	 *	DooModel inherited
	 */
	public function model1()
	{
		Doo::loadModel('Post2');
		
		$post0 = new Post2; // This post instance is used only as fetcher.
		$post = $post0->getById_first($this->params['postid']); // This post is real.
		
		//render
		$this->render('detail', array(
			'post'=>$post,
		));
	}
	
	/**
	 *	DooSmartModel inherited (cached in protected/cache) *PHP5.3
	 */
	public function model2()
	{
		Doo::loadModel('Post3');
		
		$dummy = new Post3; // init static attributes by first instance??
		$post = Post3::getById__first($this->params['postid']);
		// REM! double underscore (because static version of first is _first?)
		
		//render
		$this->render('detail', array(
			'post'=>$post,
		));
	}
	
	/**
	 *	DooSmartModel inherited (cache cleared each times) *PHP5.3
	 */
	public function model2nocache()
	{
		Doo::loadModel('Post3');
		
		$dummy = new Post3; // init static attributes by first instance??
		$post = Post3::getById__first($this->params['postid']);
		// REM! double underscore (because static version of first is _first?)
		
		//render
		$this->render('detail', array(
			'post'=>$post,
		));
		
		// no cache
		$post->purgeCache();
	}
}
?>