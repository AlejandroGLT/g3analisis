<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header('Location: ../../index.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<?php include("head.html") ?>
<body>
    <?php include("navbar.php") ?>
    <div class="container-fluid">
        <div class="row">
            <?php include("nav.html") ?>
            <main class="main col-12 col-sm-10 ">
                <div class="row justify-content-center align-content-center text-center">
                    <div class="columna col-md-12">
                        
