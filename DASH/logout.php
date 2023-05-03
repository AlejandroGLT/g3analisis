<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["id_user"]);
unset($_SESSION["id_role"]);
unset($_SESSION["id_positions"]);
header("Location: index.php");
?>