<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD, PHP ajax</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
    <?php echo $agents; ?>
    <form class="comment_form">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="name">LAstname:</label>
            <input type="text" name="lastname" id="lastname">
        </div>
        <div>
            <label for="name">Gender:</label>
            <input type="text" name="gender" id="gender">
        </div>
        <button type="button" id="submit_btn">POST</button>
        <button type="button" id="update_btn" style="display: none;">UPDATE</button>
    </form>
</div>
</body>
</html>
<!-- Add JQuery -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="scripts.js"></script>