<?php require_once 'db_session\session_config.php';

if(!isset($_SESSION['username'])){
    header('location: login.php');
}
if(isset($_SESSION['saved'])){
    if($_SESSION['saved']){
        header('location : ' . $_SERVER['PHP_SELF']);
    }    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | My note</title>
    <link rel="shortcut icon" href="icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script>
        function validateForm(event) {
            const checkbox1 = document.getElementById('chb1');
            const checkbox2 = document.getElementById('chb2');
            if (!checkbox1.checked && !checkbox2.checked) {
                alert('Saving method invalid !');
                event.preventDefault();
            }
        }
    </script>
</head>
<body>

<div class="nav_div">
    <img class="logo" src="icon.svg" alt="">
    <p class="mynote">My note</p>
    <form  style="display: inline; " action="logout.php">
    <button class="logout" >logout</button>
    </form>    
    <h4><?php echo $_SESSION['username']; ?></h4>
</div>
<div class="pb">
    <h3>Public board</h3>
    <hr>
        <?php 
        require_once "content_manager\public.php" ;
        load_public_notes();
        ?>
</div>
<div class="pn">
    <h3>Personal notes</h3>
    <hr>
    <?php 
        require_once "content_manager\private.php" ;

        load_private_notes();
        ?>

</div>
<div class="editor">
    <form action="content_manager\note_saver.php" method="post" onsubmit="validateForm(event)">
        <textarea name="note" id="note_body" placeholder="What are you thinking..." maxlength="255"  required></textarea>
        <button type="submit"  id="save">save</button>
        <div class="ch1">
            <label for="private">private</label>
            <input type="checkbox" name="private" id="chb1" value="private" >
        </div>
        <div class="ch2">
            <label for="public">public</label>
        <input type="checkbox" name="public" id="chb2" value="public" >
        </div>
    </form>
</div>

<script src="edit.js"></script>
</body>
</html>