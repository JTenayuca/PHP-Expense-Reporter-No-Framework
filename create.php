<!DOCTYPE html>
<html>
    <head>
        <title>Create New</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h1>Create A New Expense</h1>

        <hr />

        <?php
        require('mysqli_connect.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date = mysqli_real_escape_string($dbc, trim($_POST['date']));
            $vendor = mysqli_real_escape_string($dbc, trim($_POST['vendor']));
            $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
            $amount = mysqli_real_escape_string($dbc, trim($_POST['amount']));

            $query = "INSERT INTO employee_expenses (date, vendor, description, Amount) VALUES ('$date', '$vendor', '$description', '$amount')";

            $result = @mysqli_query($dbc, $query);

            if($result) {
                echo "<p>Data was added to the table</p>";
                header('Location: index.php');

            }
            else {
                echo "<p>Error!</p>";
                echo "<p>" . mysqli_error($dbc) . "<br><br>Query:" . $query . "</p>";
            }

        }

        ?>
        
        <form action="create.php" method="POST">
        <div class="form-group col-md-3">
        <p>Date: <input type="Date" class="form-control" name="date"> </p>
        <p>Vendor: <input type="text" class="form-control" name="vendor"></p>
        <p>Description: <input type="text" class="form-control" name="description"></p>
        <p>Amount: <input type="number" step="0.01" class="form-control" name="amount"></p>
        <p><button class="btn btn-success" type="submit">Submit</button></p>
        </div>
        </form>
       

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>

