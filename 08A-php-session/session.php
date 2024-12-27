<?php 
    session_start();
    if(!isset($_SESSION)){
        $_SESSION["count"]=1;
       // echo "<h1> Counter initiated</h1><br/>";
    }
    else{
        $_SESSION["count"]++;
    }
    //echo "<h1> This page has been viewed " .$_SESSION["count"]." times.<br/>";
    //echo "<h2> Refresh to update the views </h2>";
?>
