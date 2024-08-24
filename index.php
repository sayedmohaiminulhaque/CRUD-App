<?php
include("function.php");

$objcrudadmin = new crudapp();

if (isset($_POST['submit'])) {
    $msg = $objcrudadmin->add_data($_POST);
}

$data=$objcrudadmin->get_data();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="container my-4 p-4 shadow">
        <h2>Student Database</h2>

        <form action="" method="post" enctype="multipart/form-data" class="form">
        <?php
        if(isset($msg))
        {
            echo $msg;
        }
        ?>
            <input type="text" name="name" placeholder="Enter your name" class="form-control mb-2">
            <input type="number" name="roll" placeholder="Enter your roll" class="form-control mb-2">
            <label for="Images">Upload an images</label>
            <input type="file" name="file" class="form-control mb-2">
            <input type="submit" name="submit" class="form-control mb-2 bg-warning">
        </form>
    </div>

    <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($inf = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?php echo $inf['id']?></td>
                    <td><?php echo $inf['std_name']?></td>
                    <td><?php echo $inf['roll']?></td>
                    <td><img style="height: 100px; width:100px;" src="upload/<?php echo $inf['img']?>" alt=""></td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>