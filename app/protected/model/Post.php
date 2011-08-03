<?php
class Post {
    public $id;
    public $name;
    public $text;
    public $created;
    public $modified;

    public $_table = 'tbl_post';
    public $_primarykey = 'id';
    public $_fields = array('id', 'name', 'text', 'created', 'modified');
}
