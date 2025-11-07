<?php

/*******************************************************************************
 *                         MySQL Database Class
 *******************************************************************************
 *      Author:     Ahmed Awan
 *      Email:      awanahmed222@yahoo.com
 *      Website:    http://ibizz.pk
 *
 *      File:       db.class.php
 *      Version:    1.0
 *      Copyright:  (c) 2012 - ibizz.pk 
 *                  You are free to use, distribute, and modify this software 
 *                  under the terms of the GNU General Public License.  See the
 *                  included license.txt file.
 *      
 *******************************************************************************
 *  DESCRIPTION:
 *
 *      This class aids in MySQL database connectivity. It was written with
 *      my specific needs in mind.  It simplifies the database tasks I most
 *      often need to do thus reducing redundant code.  It is also written
 *      with the mindset to provide easy means of debugging erronous sql and
 *      data during the development phase of a web application.
 *
 *      The future may call for adding a slew of other features, however, at
 *      this point in time it just has what I often need.  I'm not trying to
 *      re-write phpMyAdmin or anything.  :)  Hope you find it  useful.
 *
 *
 *******************************************************************************
 */
ob_start();
session_start();

ini_set('display_errors', 1);
error_reporting(0);
class db_class
{

	public $conn;

	//METHOD FOR SERVER AND DATABASE CONNECTIVITY

	function __construct($host, $user, $pass, $db)
	{
		$this->conn = new mysqli($host, $user, $pass, $db) or die(mysqli_error());
	}

	//METHOD FOR INSERTION DATA INTO DATABASE	

	function db_insert($table, $data)
	{
		$name = '(';
		$values = '(';
		foreach ($data as $key => $value) {
			$name .= $key . ",";
			$values .= "'" . $value . "',";
		}
		$name = rtrim($name, ',') . ')';
		$values = rtrim($values, ',') . ')';

		$sql = "INSERT INTO $table $name VALUES $values";
		return mysqli_query($this->conn, $sql);
	}

	//METHOD FOR DELETING DATA FROM DATABASE	

	function db_delete($table, $cond)
	{
		$sql = "DELETE FROM $table $cond";
		return mysqli_query($this->conn, $sql);
	}

	//METHOD FOR SELECTING DATA FROM DATABASE

	function db_select($field, $table, $cond)
	{
		$sql = "SELECT $field FROM $table $cond";
		return mysqli_query($this->conn, $sql);
	}

	//METHOD FOR UPDATING DATA IN DATABASE

	function db_update($table, $data, $cond)
	{
		$dt = "";
		foreach ($data as $key => $value) {
			$dt .= $key . " = '" . $value . "', ";
		}
		$dt = rtrim($dt, ', ') . " ";
		$sql = "UPDATE $table SET $dt $cond";
		return mysqli_query($this->conn, $sql);
	}

	//METHOD FOR SELECT SINGLE RECORD

	function db_fetch_single($table, $cond)
	{
		$sql = "SELECT * FROM $table $cond";
		$q = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_array($q);
		$num = mysqli_num_rows($q);
		$row['num'] = $num;
		return $row;
	}



	// END CLASS //
}
$headerinfo = 'Location: ' . $_SERVER['HTTP_REFERER'];

$host = "localhost";
$user = "root";
$pass = "";
$db = "dictionary";
// initiating database instance //
$adb = new db_class($host, $user, $pass, $db);
