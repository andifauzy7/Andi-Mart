<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', 0);
class Migrate extends CI_Controller
{

	public function index()
	{
		$this->load->library('migration');

		if ($this->migration->latest() === FALSE)
		{
			show_error($this->migration->error_string());
		}else{
			echo "Migrate Success";
		}
	}

	public function version($id = NULL)
	{
		if ($id === NULL)
		{
			die('Please input version number');
		}

		$this->load->library('migration');
		if ($this->migration->version($id) === FALSE)
		{
			show_error($this->migration->error_string());
		}
		else
		{
			echo "Migrate Success";
		}

	}
}
