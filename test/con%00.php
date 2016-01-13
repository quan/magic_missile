<?php

$db = new mysqli('127.0.0.1', 'nickrwpj_mmadmin', 'MagicMissile!', 'nickrwpj_magic_missile');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
} else {
	echo 'Yup, it worked! <br/>';
}



$sql = <<<SQL
    SELECT *
    FROM `pet`
SQL;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row = $result->fetch_assoc()){
    echo $row['pet_name'] . '<br />';
}

echo 'Total results: ' . $result->num_rows;


$result->free();

$db->real_escape_string('This is an unescaped "string"');

$db->escape_string('This is an unescape "string"');

$db->close();

/////////////////////////////////////////////////////////////////////////////////////

$db = new mysqli('127.0.0.1', 'nickrwpj_mmadmin', 'MagicMissile!', 'nickrwpj_magic_missile');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
} else {
	echo 'Yup, it worked! <br/>';
}

$statment = $db->prepare("SELECT * FROM `pet`");

$statement->execute();

$statement->bind_result($animals);

while($statement->fetch()){
    echo $animals . '<br />';
}

$statement->free_result();

$db->close();
?>