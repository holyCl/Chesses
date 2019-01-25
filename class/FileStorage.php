<?php

include 'Storage.php';

class FileStorage implements Storage
{
	var $filename;

	function __construct($filename)
	{
		$this->filename = $filename;
	}

	function save($figures)
	{
		file_put_contents($this->filename, $figures);
	}

	function load()
	{
		return file_get_contents($this->filename);
	}
}