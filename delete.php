<?php
    require 'database.php';

        // keep track post values
        $id = $_POST['id'];
        
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">

                <div class="row">
                <h3>PHP CRUD Grid</h3>
                </div>

                <p>
                    <a href="index.php" class="btn btn-success">Home</a>
                </p><br>
                
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete a Customer</h3>
                    </div>

                    <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email Address</th>
                      <th>Mobile Number</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM customers WHERE id= ?';
                   
                            $q = $pdo->prepare($sql);
    
                            // pass values to the query and execute it
                            $q->execute([$id]);
                            
                            $q->setFetchMode(PDO::FETCH_ASSOC);
                            
                            // print out the result set
                            while ($r = $q->fetch()) {

                            echo '<tr>';
                            echo '<td>'. $r['id'] . '</td>';
                            echo '<td>'. $r['name'] . '</td>';
                            echo '<td>'. $r['email'] . '</td>';
                            echo '<td>'. $r['mobile'] . '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>

                     
                    <form class="form-horizontal" action="delete-final.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure you want to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn btn-success" href="index.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>