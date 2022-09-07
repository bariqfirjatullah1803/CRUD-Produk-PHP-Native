<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="card mt-5">
      <div class="card-header">
        <h1>Product <a href="add.php" class="btn btn-primary">+ Add</a></h1>
      </div>
      <div class="card-body">
        <?php
          include 'koneksi.php';

          $result = mysqli_query($mysqli, "SELECT *,product.name as product,category.name AS category FROM product JOIN category ON product.category_id = category.id");
        ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Category</th>
              <th scope="col">Harga</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $number = 1;
              while($product_data = mysqli_fetch_array($result)){
                echo '<tr>';
                echo '<th scope="row">'.$number.'</th>';
                echo '<td>'.$product_data['product'].'</td>';
                echo '<td>'.$product_data['desc'].'</td>';
                echo '<td>'.$product_data['category'].'</td>';
                echo '<td>'.$product_data['harga'].'</td>';
                echo '<td><a href="edit.php?id='.$product_data['id'].'" class="btn btn-warning">Edit</a> <a href="delete.php?id='.$product_data['id'].'" class="btn btn-danger">Delete</a></td>';
                echo '</tr>';
                $number++;
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
</body>

</html>