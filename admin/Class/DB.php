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

	public function getOne($field,$term)
	{
		$sql = mysql_query("SELECT * FROM $this->db WHERE $field = '$term'");
		return $sql;
	}
}