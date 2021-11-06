<!DOCTYPE html>
<html>
    <head>
        <title>Edit Entry</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <head>

    <body>

    <h1>Edit Entry</h1>
    <hr />

    <?php
        require('mysqli_connect.php');
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
                    $id = mysqli_real_escape_string($dbc, trim($_POST['id']));
                } else {
                    echo "<p>Error, invalid entry id</p>";
                }
                
                //Create variables for date, vendor description, amount. Set them equal to the post entry
                //Write SQL update query that updates the db using these new variables.
                $errors = [];
                if(empty($_POST['date'])) {
                    $errors[]="Please enter a valid date";
                } else {
                    $date = mysqli_real_escape_string($dbc, trim($_POST['date']));
                }

                if(empty($_POST['vendor'])) {
                    $errors[]="Please enter valid vendor information";
                }
                else {
                    $vendor = mysqli_real_escape_string($dbc, trim($_POST['vendor']));
                }

                if(empty($_POST['description'])) {
                    $errors[]="Please enter a description";
                }
                else {
                    $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
                }
                
                if((empty($_POST['amount'])) || !is_numeric($_POST['amount']) || $_POST['amount'] < 0) {
                    $errors[]="Please enter a valid amount";
                }
                else {
                    $amount = mysqli_real_escape_string($dbc, trim($_POST['amount']));
                }
            
                if(empty($errors)){
                    $query = "UPDATE employee_expenses SET date='$date', vendor='$vendor', description='$description', Amount='$amount' WHERE id=$id";
                    $result = @mysqli_query($dbc, $query);
                    if(mysqli_affected_rows($dbc) == 1) {
                        //echo "<p>The entry has been updated</p>";
                        //echo "<p><a href='index.php'>Home</a>";
                        header('Location: index.php');
                    } elseif (mysqli_affected_rows($dbc) == 0 && mysqli_errno($dbc) == 0) {
                    echo "<p>No values changed</p>";
                    }
                    else {
                        echo "<p>The entry could not be updated due to a system error</p>";
                        echo mysqli_error($dbc) . "Query:" . $query;
                    }
                } else {
                    echo "<p>The following error(s) occured:<br>";
                    foreach($errors as $msg) {
                        echo "-$msg<br>\n";
                    }
                }
                
             
        } else {
            if((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
                //show form
                $id = mysqli_real_escape_string($dbc, trim($_GET['id']));
            } else {
                echo "<p>This page has been accessed in error</p>";
            }
                
                $query = "SELECT date, vendor, description, Amount FROM employee_expenses WHERE id=$id";
                $result = @mysqli_query($dbc, $query);
        
                if(mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_NUM);
                    echo   '<div class="form-group col-md-3" >
                            <form action="edit_entry.php" method="POST">
                            <p>Date: <input type="Date" name="date" class="form-control" value="' . htmlspecialchars($row[0]) . '"></p>
                            <p>Vendor: <input type="text" name="vendor" class="form-control" value="' . htmlspecialchars($row[1]) . '"></p>
                            <p>Description: <input type="text" name="description" class="form-control" value="' . htmlspecialchars($row[2]) . '"></p>
                            <p>Amount: <input type="number" step="0.01" name="amount" class="form-control" value="' . htmlspecialchars($row[3]) . '"></p>
                            <p><button class="btn btn-success" type="submit">Update</button></p>
                            <p><input type="hidden" name="id" value=' . $id . '></p>
                            </form>
                            </div>';
                    
                }

            }
            
?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>