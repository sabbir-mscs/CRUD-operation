<!DOCTYPE html>
<?php
include 'db.php';
$id = $_GET['trackID'];
$sql = "SELECT * FROM tasks WHERE id = '$id'";
$rows = $db->query($sql);
$row = $rows->fetch_assoc();
// var_dump($row);
if (isset($_POST['send'])) {

    $task = htmlspecialchars($_POST['task']);
    $sql2 = "UPDATE tasks SET task ='$task' WHERE id = '$id'";
    $db->query($sql2);
    header('location: index.php');
}


?>
<html lang="en">

<head>
    <title>CRUDE Operation | PHP</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />

</head>

<body>
    <!-- START HERE -->
    <div class="container">

        <h1 class="display-4 text-dark text-center mb-3">CRUD APP</h1>
        <hr>

        <form method="post">
            <div class="form-group">
                <label for="task">Update Task</label>
                <input type="text" required name="task" value="<?php echo $row['task']; ?>" class="form-control">
            </div>
            <input type="submit" name="send" class="btn btn-success" value="Update">
            <a href="index.php" class="btn btn-warning ml-2">Back</a>
        </form>

    </div>

    <!-- END -->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script>
        // Get the current year for the copyright
        $("#year").text(new Date().getFullYear());
    </script>
</body>

</html>