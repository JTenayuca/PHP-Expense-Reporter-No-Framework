<!DOCTYPE html>
<html>
    <head>
        <title>Expense Reporter</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <head>

    <body>

    <h1>Expense Reporter</h1>
    <hr />
        
            <?php
                require('mysqli_connect.php');
                $query = "SELECT * FROM employee_expenses ORDER BY date DESC";
                $result = @mysqli_query($dbc, $query);
                $rowcount = mysqli_num_rows($result);
                if($rowcount == 0) {
                    echo '<p>There are no records to display</p>';
                } 
                else if($result) {
                echo "<table class='table table-striped'>
                            <thead class='thead-dark'>
                                <td>Date</td>
                                <td>Vendor</td>
                                <td>Description</td>
                                <td>Amount</td>
                            </thead>
                        <tbody>";
            // make db connection 
            // use php to loop through results and display them in a table include view, update and delete columns
            
                while($row = mysqli_fetch_array($result)) {
                        echo   '<tr>
                                <td>' . htmlspecialchars($row['date']) .'</td>
                                <td>' . htmlspecialchars($row['vendor']) .'</td>
                                <td>' . htmlspecialchars($row['description']) .'</td>
                                <td>$'. htmlspecialchars($row['Amount']) .'</td>
                                <td><a class="btn btn-warning" href="edit_entry.php?id=' . htmlspecialchars($row['id']) .'">Edit</a></td>
                                <td><a class="btn btn-danger" href="delete_user.php?id=' . htmlspecialchars($row['id']) .'">Delete</a></td>
                                </tr>';
                    }
                      //  echo "</tbody>";
                       // echo "</table>";
                } 

               
                
                else {
                    
                    echo mysqli_error($dbc) . "Query:" . $query;
                }
                        echo  '
                        </tbody>';
            echo '
            </table>';
                mysqli_free_result($result);
                mysqli_close($dbc);    

            ?>
            
 <br />     
<!-- Add create button -->
<p><a class="btn btn-primary" href="create.php">Create new</a></p>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>