<?php
require 'include/auth.php';
$title = 'Publisher Details';
require 'include/header.php'; 

try{
    $publisherId=$_GET['publisherId'];
    require('include/db.php');
    $sql="SELECT * FROM exampublishers WHERE publisherId=:publisherId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':publisherId', $publisherId, PDO::PARAM_INT);
    $cmd->execute();
    $publisher=$cmd->fetch();

    if (empty($publisher)) {
        header('location:404.php');
        exit();
    }
        $name=$publisher['name'];
    }catch(Exception $e){
        header('location:error.php');
        exit();
    }
?>


<main>
    <form method="post" action="save-publisher.php">
        <fieldset class="p-2">
            <label for="name" class="col-2">Publisher: </label>
            <input name="name" id="name" required maxlength="100" value="<?php echo $name; ?>   "/>
        </fieldset>
        <button class="offset-2 btn btn-primary p-2">Save</button>
    </form>
</main>
</body>
</html>
