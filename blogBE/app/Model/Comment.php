<?php

App::uses('Model', 'Model');

class Comment extends AppModel
{
	var $name = "Comment";

	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'id',
		),
		'User' => array(
			'ClassName' => 'User',
			'foreignKey' => 'id',
		)
	);


}
