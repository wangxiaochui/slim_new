<?php
namespace App\Controller;
class Base
{
	public function __construct(\Slim\Container $ci)
	{
		$this->db = $ci->db;
        $this->view = $ci->view;
	}
}