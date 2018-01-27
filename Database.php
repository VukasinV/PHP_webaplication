<?php
class Database
{
private $hostname="localhost";
private $username="root";
private $password="";
private $dbname;
private $dblink; // veza sa bazom
private $result; // Holds the MySQL query result
private $records; // Holds the total number of records returned
private $affected; // Holds the total number of affected rows
function __construct($dbname)
{
$this->dbname = $dbname;
                $this->Connect();
}
/*
function __destruct()
{
$this->dblink->close();
//echo "Konekcija prekinuta";
}
*/
public function getResult()
{
return $this->result;
}
//konekcija sa bazom
function Connect()
{
$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
if ($this->dblink ->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
    exit();
}
$this->dblink->set_charset("utf8");
//echo "Uspesna konekcija";
}
//select funkcija
function select ($table="products", $rows = '*', $where = null, $order = null)
{
$q = 'SELECT '.$rows.' FROM '.$table;  
        if($where != null)  
            $q .= ' WHERE '.$where;  
        if($order != null)  
            $q .= ' ORDER BY '.$order; 			
$this->ExecuteQuery($q);
//print_r($this->getResult()->fetch_object());
}
function insert ($table="novosti", $rows = "naslov, tekst", $values)
{
$insert = 'INSERT INTO '.$table;  
            if($rows != null)  
            {  
                $insert .= ' ('.$rows.')';   
            }  
			$insert .= ' VALUES(';
			$insert .="'".$values[0]."', '".$values[1]."')";
			//echo $insert;
if ($this->ExecuteQuery($insert))
return true;
else return false;
}

//added
function insertContact ($table="novosti", $rows = "naslov, tekst", $values)
{
$insert = 'INSERT INTO '.$table;  
            if($rows != null)  
            {  
                $insert .= ' ('.$rows.')';   
            }  
			$insert .= ' VALUES(';
			$insert .="'".$values[0]."', '".$values[1]."', '".$values[2]."')";
			//echo $insert;
if ($this->ExecuteQuery($insert))
return true;
else return false;
}

function insertProduct ($table="products", $rows = "name, description, category_id, created", $values)
{
$date = date('Y-m-d H:i:s');
$insert = 'INSERT INTO '.$table;  
            if($rows != null)  
            {  
                $insert .= ' ('.$rows.')';   
            }  
			$insert .= ' VALUES(';
			$insert .="'".$values[0]."', '".$values[1]."', '".$values[2]."', '".$values[3]."', '".$date."')";
			//echo $insert;
if ($this->ExecuteQuery($insert))
return true;
else return false;
}
//added end
function update ($table="products", $values)
{
$update = 'UPDATE '.$table." SET name='". $values[1] ."', description='" . $values[2] . "', price='" . $values[3] . "', category_id='" . $values[4] . "' WHERE id=". $values[0];
			//echo $update;
		
if ($this->ExecuteQuery($update))
return true;
else return false;
}
function delete ($table="products", $values)
{
$delete = 'DELETE FROM '.$table.' WHERE id='.$values[0];
//echo $delete;
if ($this->ExecuteQuery($delete))
return true;
else return false;
}

//funkcija za izvrsavanje upita
function ExecuteQuery($query)
{
if($this->result = $this->dblink->query($query)){
/*
$this->records         = $this->result->num_rows;
$this->affected        = $this->dblink->affected_rows;
*/
// echo "Uspesno izvrsen upit";
return true;
}
else
{
return false;
}
}

function CleanData()
{
//mysql_string_escape () uputiti ih na skriptu vezanu za bezbednost i sigurnost u php aplikacijama!!
}

}
?>