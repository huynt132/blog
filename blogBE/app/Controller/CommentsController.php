<?php

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package        app.Controller
 * @link        https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class CommentsController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function add()
	{
		$this->Comment->create();
		if ($new_comment = $this->Comment->save($this->request->data)) {
			$this->response->type('json');
			$this->response->statusCode(201);
			$this->response->body(json_encode($new_comment));
			return $this->response;
		}

		$this->response->type('json');
		$this->response->statusCode(200);
		$this->response->body(json_encode([
			'success' => false,
			'message' => 'Bad request',
		]));
		return $this->response;
	}

	public function delete($id)
	{
		$this->response->type('json');

		if (!$this->Comment->delete($id)) {
			$this->response->statusCode(400);
			$this->response->body(json_encode([
				'success' => false,
				'message' => 'Bad request',
			]));
			return $this->response;
		}

		$this->response->statusCode(204);
		return $this->response;
	}
}
