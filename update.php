<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/style.css">


    <title>Document</title>
</head>
<body>
<?php
require_once "include/conexion.php";
require_once "include/nav.php";
$result["title"]="";

if (!isset($_POST['update'])&& !isset($_POST['modifier'])) {
    
    header("location: index.php");
}


    

 if (isset($_POST['update'])) {
  

    
    $id=$_POST["id"];
    $sqlstate=$PDO->query("select*from todo_table where id=$id");
    $result=$sqlstate->fetch(PDO::FETCH_ASSOC);

} 


if (isset($_POST['modifier'])) {
    $title=$_POST['title'];
    $id=$_POST["id"];

    if (!empty($title)) {
        
        $sqlstate=$PDO->prepare("UPDATE todo_table SET title=?WHERE id=$id");
        $sqlstate->execute([$title]);
         ?>
         <div class="alert alert-success" role="alert">
             la tache bien modifier
       </div>
       <?php
        }
        else {
         ?>
     <div class="alert alert-danger" role="alert">
         the <span class="font-weight-bold">title</span> is mandatory(required)
     </div>
     <?php
        }



   
    
    
      
    }
    
    
 
           
          
?>


<div class="container border border-primary my-5 p-5">
<h4>ajouter la tache</h4>
        <form action="" method="POST">
            <div class="form-group">
                <label>Title <span class="required">*</span></label>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="text" class="form-control" name="title" value="<?php echo $result["title"]; ?>" >
            </div>
            <button type="submit" name="modifier" class="btn btn-primary">modifier</button>
        </form>
</div>

</body>
</html>