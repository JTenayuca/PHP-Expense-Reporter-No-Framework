<!DOCTYPE html>
<html>
    <head>
        <title>Delete Entry</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <head>

    <body>

    <h1>Delete Entry</h1>
    <hr />

    <?php
        require('mysqli_connect.php');
     //   $id = $_GET['id'];
     //   echo "<p>ID:" . $id . "</p>"; 

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($_POST['sure'] == 'Yes') {
                if((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
                    $id = mysqli_real_escape_string($dbc, trim($_POST['id']));
                } else {
                    echo "<p>Error, invalid entry id</p>";
                }
                $query = "DELETE FROM employee_expenses WHERE id=$id LIMIT 1";
                $result = @mysqli_query($dbc, $query);
                if(mysqli_affected_rows($dbc) == 1) {
                    echo "<p>The entry has been deleted</p>";
                    echo "<p><a href='index.php'>Home</a>";
                } else {
                    echo "<p>The entry could not be deleted due to a system error</p>";
                }
            } else {
                header('Location: index.php');
            }
        } else {
            //show form
            if((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
                //show form
                $id = mysqli_real_escape_string($dbc, trim($_GET['id']));
            } else {
                echo "<p>This page has been accessed in error</p>";
            }
            
            $query = "SELECT date, description, vendor, Amount FROM employee_expenses WHERE id=$id";
            $result = @mysqli_query($dbc, $query);

            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_NUM);

                echo "<h3>Date: " . htmlspecialchars($row[0]) . "</h3>
                <h3>Description: " . htmlspecialchars($row[1]) . "</h3>
                <h3>Vendor: " . htmlspecialchars($row[2]) . "</h3>
                <h3>Amount: $" . htmlspecialchars($row[3]) . "</h3>
                <br />
                <p>Are you sure you want to delete this entry?</p>";
                echo "<form action='delete_user.php' method='POST'>
                <div class='form-group col-md-3'>
                <div class='form-check form-check-inline'>
                <input type='radio' class='form-check-input' name='sure' value='Yes'> Yes
                </div>
                <div class='form-check form-check-inline'>
                <input type='radio' class='form-check-input' name='sure' value='No' checked='checked'> No
                </div>
                <p><button class='btn btn-danger' type='submit'>Delete</button></p>
                <input type='hidden' name='id' value='" . htmlspecialchars($id) . "'>
                </div>
                </div>
                </form>";
            } else {
                echo "<p>This page has been accessed in error</p>";
            }
        }
        mysqli_close($dbc);
    ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>