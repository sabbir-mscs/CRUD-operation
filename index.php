<!DOCTYPE html>
<?php
include 'db.php';

$page = (isset($_GET['page']) ? (int) $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ((int) $_GET['per-page']) <= 50 ? (int) $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$sql = "select * from tasks limit " . $start . " , " . $perPage . " ";
$total = $db->query("SELECT * FROM tasks")->num_rows;
$pages = ceil($total / $perPage);
$rows = $db->query($sql);

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
    <button type="button" class="btn btn-success" data-target="#taskModal" data-toggle="modal">Add Task</button>
    <button type="button" class="btn btn-info float-right print" onclick="print();">Print</button>
    <hr>

    <!-- Modal -->
    <div id="taskModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Task</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

            <form method="post" action="add.php">
              <div class="form-group">
                <label for="task">Update Task</label>
                <input type="text" required name="task" class="form-control">
              </div>
              <input type="submit" name="send" class="btn btn-success" value="Add Task">
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <table class="table table-hover mx-auto">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Task</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $rows->fetch_assoc()) : ?>
          <tr>
            <td scope="row"> <?php echo $row['id']; ?> </td>
            <td class="col-10"><?php echo $row['task']; ?></td>
            <td><a class="btn btn-warning" href="update.php?trackID=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a class="btn btn-danger" href="delete.php?trackID=<?php echo $row['id']; ?>">Delete</a></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <div class="d-flex justify-content-center">
      <nav class="mx-auto" aria-label="Page navigation example">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $pages; $i++) : ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>&per-page=<?php echo $perPage; ?>"><?php echo $i; ?></a></li>
          <?php endfor; ?>
        </ul>
      </nav>
    </div>

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