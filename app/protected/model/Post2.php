<?php
Doo::loadCore('db/DooModel');

class Post2 extends DooModel {
    public $id;
    public $name;
    public $text;
    public $created;
    public $modified;

    public $_table = 'tbl_post';
    public $_primarykey = 'id';
    public $_fields = array('id', 'name', 'text', 'created', 'modified');

    function __construct() {
        parent::$className = __CLASS__;
    }
}
