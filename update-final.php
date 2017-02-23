<?php
        require 'database.php';
         
        // keep track post values
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
         
         
        // update data
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE customers  set name = ?, email = ?, mobile =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$mobile,$id));
            Database::disconnect();
            header("Location: index.php");

?>