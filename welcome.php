<?php
session_start();
?>


<html>
    <?php
        echo "<h1> Welcome " . $_SESSION["user"] . "</h1>";
    ?>
</html>