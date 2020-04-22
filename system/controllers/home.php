<?php

/**
 *
 */
class Home extends Controller
{


	public function index($name = '', $otherName = '')
	{
		$data = "";
		$name = "";

		$this->view('home/index', $data);
	}

	public function settings()
	{
		$this->view('home/settings');
	}

	public function referal($value = '')
	{
		if (setcookie("refer", $value, time() + 96000 * 50, '/')) {
			redirect_to("/");
		}
	}
}
