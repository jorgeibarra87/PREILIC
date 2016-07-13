<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>base de datos</title>
</head>

<body>
<?php
include('adodb5/adodb.inc.php');	 
class base
{
  private $con;
  private $rs;
  function __construct($host,$user,$pass,$base)
  {
    ini_set("display_errors", "0");
	ini_set("display_warnings", "0");
    $this->con=&ADONewConnection('mysql');
	$this->con->PConnect('localhost','root','','plico');
  }
  function dosql($sql)
  {
    ini_set("display_warnings", "0");
    ini_set("display_errors", "0");
    $this->rs=$this->con->Execute($sql);
	return($this->rs);
  }
}
?>
</body>
</html>
