<?php
// auth check - this page is now private
require('include/auth.php');

$title = 'Upload Logo';
require('include/header.php');
?>
<main>
    <h1>Upload a logo for the website</h1>

    <form action="save-logo.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" />
        </fieldset>
        <button class="btnOffset">Save</button>
    </form>
</main>