<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{


		echo view('header.php');
		echo view('body.php');
		echo view('footer.php');
		//return view('tables.php');
	}
}
