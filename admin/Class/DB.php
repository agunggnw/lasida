<?php

class DB
{
	protected $db;

	function __construct($table)
	{
		$this->db = $table;
	}

	public function getAll()
	{
		$sql = mysql_query("SELECT COUNT(*) FROM $this->db");
		return $sql;
	}
}