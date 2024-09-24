<?php
if (isset($_POST["suprimer"])) {
    require_once "include/conexion.php";
    $id=$_POST["id"];
    $sqlstate= $PDO->prepare("delete from todo_table where id = ?");
    $sqlstate->execute([$id]);
    header("location:index.php");
}





?>