<?php

/**
 *
 */
class Test extends Controller
{

	public function index($name = '', $otherName = '')
	{
		$user = $this->model("User");
		$user->name = $name;

		$this->view('test/index', ['name' => $user->name ]);
	}

	public function strip()
	{
	

		$this->view('test/strip');
	}
}
