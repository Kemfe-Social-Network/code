<?php
require_once(LIB_PATH . DS . 'db' . DS . 'config.php');
class MySQLDatabase
{
	private $connector;
	private $real_escape_string_exists;
	private $magic_quotes_active;
	public $lastQ;

	function __construct()
	{
		$this->openCon();

		$this->real_escape_string_exists = function_exists("mysqli_real_escape_string");
	}

	public function openCon()
	{
		$this->connector = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if (!$this->connector) {
			die("Sorry, we're having server downtime ");
		}
	}

	public function closeCon()
	{
		if (isset($this->connector)) {
			mysqli_close($this->connector);
			unset($this->connector);
		}
	}

	public function query($sql)
	{

		$this->lastQ = $sql;
		$rs = mysqli_query($this->connector, $sql);
		echo $this->cQuery($rs);

		return $rs;
	}

	public function fetchQuery($rs)
	{
		return mysqli_fetch_assoc($rs);
	}

	public function fetchAll($rs)
	{
		return mysqli_fetch_all($rs, MYSQLI_ASSOC);
	}

	public function free($rs)
	{
		mysqli_free_result($rs);
	}

	public function numRows($rs)
	{
		return mysqli_num_rows($rs);
	}

	public function lastInsertedId()
	{
		return mysqli_insert_id($this->connector);
	}

	public function affectedRows()
	{
		return mysqli_affected_rows($this->connector);
	}

	public function autoCommit()
	{
		mysqli_autocommit($this->connector, false);
	}

	public function Commit()
	{
		mysqli_commit($this->connector);
	}
	public function RollBack()
	{
		mysqli_rollback($this->connector);
	}

	//Comfirms if query was successful.
	private function cQuery($rs)
	{
		if (!$rs) {
			$output = "Database query failed.." . mysqli_error($this->connector) . "<br/><br/>";
			$output .= "The las Query was: " . $this->lastQ;
			die($output);
		}
	}


	public function SQLEscape($value)
	{
		if ($this->real_escape_string_exists) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work

			$value = mysqli_real_escape_string($this->connector, $value);
		}
		return $value;
	}
}


$db = new MySQLDatabase();
