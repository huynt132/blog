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
class PostsController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function index()
	{
		$per_page = $this->params['url']['limit'];
		$this->paginate = array(
			'limit' => $per_page,
			'page' => $this->params['url']['page']
		);
		$posts = $this->paginate("Post");

		$row_count = $this->Post->find('count');
		$page_count = ceil($row_count / $per_page);

		$this->response->type('json');
		$this->response->body(json_encode([
			'success' => true,
			'data' => $posts,
			'max_page' => $page_count,
		]));
		return $this->response;
	}

	public function view($id)
	{
//		$this->autoRender = false;
		$this->response->type('json');
		if (!$id) {
			$this->response->statusCode(400);
			$this->response->body(json_encode([
				'success' => false,
				'message' => 'Bad request',
			]));
			return $this->response;
		}

		$post = $this->Post->findById($id);
		if (!$post) {
			$this->response->statusCode(404);
			$this->response->body(json_encode([
				'success' => false,
				'message' => 'Not found!!',
			]));

			return $this->response;
		}
		$this->response->statusCode(200);
		$this->response->body(json_encode([
			'success' => true,
			'data' => $post,
		]));
		return $this->response;
	}

	public function add()
	{
		$this->Post->create();
		if ($new_post = $this->Post->save($this->request->data)) {
			$this->response->type('json');
			$this->response->statusCode(201);
			$this->response->body(json_encode($new_post));
			return $this->response;
		}
	}

	public function delete($id)
	{
		$this->response->type('json');
		if (!$this->Post->delete($id)) {
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

	public function edit($id = null)
	{
		$this->response->type('json');

		if (!$id) {
			$this->response->statusCode(400);
			$this->response->body(json_encode([
				'success' => false,
				'message' => 'Bad request',
			]));
			return $this->response;
		}

		$post = $this->Post->findById($id);
		if (!$post) {
			$this->response->statusCode(404);
			$this->response->body(json_encode([
				'success' => false,
				'message' => 'Not found!!',
			]));

			return $this->response;
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->Post->id = $id;
			if ($updated_post = $this->Post->save($this->request->data)) {
				$this->response->statusCode(200);
				$this->response->body(json_encode([
					'success' => true,
					'message' => $updated_post,
				]));
			}
			return $this->response;
		}

	}
}
