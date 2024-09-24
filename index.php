<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/style.css">
    <title>TODO-APP</title>
</head>

<body>
    <?php
    require_once 'include/conexion.php';
    include_once 'include/nav.php';
    ?>
    <?php  $title=""  ?>
    <div class="container border border-primary my-5 p-5">
        <?php if (isset($_POST['ajouter'])) {
           $title=$_POST['title'] ;
           if (!empty($title)) {
           $sqlstate=$PDO->prepare("insert into todo_table values(null,?)");
           $sqlstate->execute([$title]);

            ?>
            <div class="alert alert-success" role="alert">
                la tache bien enregistrer
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

        <h4>ajouter la tache</h4>
        <form action="" method="POST">
            <div class="form-group">
                <label>Title <span class="required">*</span></label>
                <input type="text" class="form-control" name="title" value="<?php echo $title ?>" id="enregistrement">
            </div>
            <button type="submit" name="ajouter" class="btn btn-primary">ajouter</button>
        </form>
    </div>
    <?php
     
     $sqlstate=$PDO->query("select*from todo_table");
     $result=$sqlstate->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Operation</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
  foreach ($result as $key => $val) {
    ?>
    <tr>
      <td><?php echo $val['id'];  ?></td>
      <td><?php echo $val['title'];  ?></td>
      
      <form action="" method="POST">
       
    <td>
      <input type="hidden" name="id" value="<?php echo $val['id'] ?>">
      <button formaction="update.php" type="submit" name="update" class="btn btn-primary">UPDATE</button>
      <button formaction="delete.php" type="submit" name="suprimer" class="btn btn-danger">DELETE</button>
    </td>

      </form>

    </tr>
    <?php
  }

    ?>
    
  </tbody>
</table>
</body>

</html>