<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="card-header">
          <h1>Add Product</h1>
        </div>
        <div class="card-body">
          <form action="add.php" method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
              <label for="desc" class="form-label">Description</label>
              <input type="text" class="form-control" name="desc">
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select name="category_id" class="form-control">
                <?php
                  include 'koneksi.php';
                  $result = mysqli_query($mysqli, "SELECT * FROM category");
                  while($category_data = mysqli_fetch_array($result)){
                    echo '<option value="'.$category_data['id'].'">'.$category_data['name'].'</option>';
                  }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" class="form-control" name="harga">
            </div>
            <div class="mb-3">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $desc = $_POST['desc'];
      $category_id = $_POST['category_id'];
      $harga = $_POST['harga'];

      $result = mysqli_query($mysqli, "INSERT INTO product (`name`,`desc`,`category_id`,`harga`) VALUES ('$name','$desc','$category_id','$harga')");
      if($result){
        echo '<div class="alert alert-success">Data berhasil ditambahkan <a href="index.php">Lihat Data</a></div>';
      }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
