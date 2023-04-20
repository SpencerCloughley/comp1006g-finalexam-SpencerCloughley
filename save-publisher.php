<?php
require 'include/auth.php';
$title = 'Saving Publisher...';
require 'include/header.php';
$name = $_POST['name'];
$publisherId=$_POST['publisherId'];
$ok = true;

if (empty(trim($name))) { 
    echo 'Name is required<br />';
    $ok = false;
}

if ($ok == true) {
    // save code goes here
    try{
        require('include/db.php');
        $sql="UPDATE exampublishers SET name=:name WHERE publisherId= :publisherId";

        //prepare and add each variable to be included in the SQL statement
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':name', $name, PDO::PARAM_STR, 100);
        $cmd->bindParam(':publisherId', $publisherId, PDO::PARAM_INT);

        $cmd->execute();

        $db = null;

        }catch(Exception $e){
            header('location:error.php');
            exit();
        }
    echo 'Publisher Saved';
    header('location:publishers.php');
}

?>
</body>
</html>
