<?php


/*
PDO (PHP Data Objects) is a PHP extension through which we can access and work with databases.
Though PDO is similar in many aspects to mySQLi, it is better to work with for the following
reasons:
• It is better protected against hackers.
• It is consistent across databases, so it can work with MySQL as well as other types of databases
(SQLite, Oracle, PostgreSQL, etc.)
• It is object oriented at its core.
*/

require 'db_config.php';


$sql = "SELECT * FROM users WHERE firstname=:firstname AND email=:email";

//$sql = "SELECT * FROM users WHERE firstname=? AND email=?";

$query = $dbh->prepare($sql);
$query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
$query->bindParam(':email', $email, PDO::PARAM_STR);
//$query->bindParam(1, $firstname, PDO::PARAM_STR);
//$query->bindParam(2, $email, PDO::PARAM_STR);

/*
• PDO::PARAM_STR is used for strings.
• PDO::PARAM_INT is used for integers.
• PDO::PARAM_BOOL allows only boolean (true/false) values.
• PDO::PARAM_NULL allows only NULL datatype.
*/

$firstname = "vts";
$email = "vts@vtsss.com";

$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ); // PDO::FETCH_ASSOC

//var_dump($results);

if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        echo $result->firstname . ", ";
        echo $result->lastname . ", ";
        echo $result->email;

        /*echo $result['firstname'];
        echo $result['lastname'];
        echo $result['email'];*/


    }
}
