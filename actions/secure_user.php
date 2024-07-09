<?php 
    session_start();
    
    if(!isset($_SESSION['USER'])){
        header("location:../../index.php");
    }
?>