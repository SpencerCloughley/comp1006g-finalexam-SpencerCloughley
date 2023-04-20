<?php
require 'include/auth.php';

$title='Publishers';
require 'include/header.php';?>

<main>
    <h1>Publishers</h1>

    <?php
    try{
    require('include/db.php');

    $sql="SELECT * FROM exampublishers";
    $cmd = $db->prepare($sql);
    $cmd->execute();
    $publishers=$cmd->fetchAll();

    echo '<table><thead><th>Publisher</th><th>Edit</th></thead>';
    foreach($publishers as $publisher){
        echo '<tr>
        <td>' . $publisher['name'] . '</td>
        <td>
        <a href="publisher-details.php?pageId=' . $publisher['publisherId'] .'" title="Edit">
            Edit
        </a>
        </td>
        </tr>';
    }

    $db=null;
    }
    catch(Exception $e){
        header('location:error.php');
        exit();
    }
    ?>
</main>
