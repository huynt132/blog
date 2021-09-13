<?php

class UsersController extends AppController
{
	var $name = "Users";
	var $helpers = array("Html");
	var $component = array("Session");

	function login()
	{
		//check exist,
		$data = $this->request->data;
		$username = $data['email'];
		$password = $data['password'];

		//create session
		$conditions = array("User.email" => $username, "User.password" => $password);
		$login_check = $this->User->find('first', array(
			'conditions' => $conditions
		));

		$this->response->type('json');
		$this->response->statusCode(200);
		$this->response->body(json_encode([
			'success' => true,
			'data' => $login_check,
		]));
		return $this->response;

		$this->Session->write("session", $username); //ghi session
	}

	function register()
	{
		//check exist,
		$data = $this->request->data;
		$email = $data['email'];

		//create session
		$conditions = array("User.email" => $email);
		$login_check = $this->User->find('first', array(
			'conditions' => $conditions
		));

		if ($login_check != null) {
			$this->response->type('json');
			$this->response->statusCode(403);
			$this->response->body(json_encode([
				'success' => false,
				'message' => $email . " already exist!!"]));
			return $this->response;
		}

		$new_user = $this->User->save($this->request->data);
			$this->response->type('json');
			$this->response->statusCode(201);
		$this->response->body(json_encode([
			'success' => true,
			'message' => $new_user]));
		return $this->response;
	}

	function info()
	{
		if ($this->Session->check("session")) {//kiểm tra có session hay không
			$username = $this->Session->read('session');
			$this->set("name", $username);
		} else {
			$this->render("login");
		}
	}

	function logout()
	{
		$this->Session->delete('session'); //xóa session
		$this->redirect("login"); //chuyển trang login
	}
}
