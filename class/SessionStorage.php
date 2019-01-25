<?php

require_once 'Storage.php';

class SessionStorage implements Storage
{
	var $name;

	function __construct($name)
	{
		session_start();
		$this->name = $name;
	}

	function save($figures)
	{
		$_SESSION[$this->name] = $figures;
	}

	function load()
	{
		return $_SESSION[$this->name];
	}
}