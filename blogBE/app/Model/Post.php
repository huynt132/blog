<?php

App::uses('Model', 'Model');

class Post extends AppModel
{
	var $name = "Post";

	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'post_id',
			'limit' => '5',
			'order' => 'Comment.created_at DESC',
			'dependent' => true
		)
	);

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'id',
		)
	);
}
