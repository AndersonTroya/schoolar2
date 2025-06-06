<?php
    
    include('../../config/database.php');

    $fname  = $_POST['f_name'];
    $lname  = $_POST['l_name'];
    $email  = $_POST['e_mail'];
    $passwd = $_POST['passw'];
    
    // Obtener el contenido del archivo y convertirlo
    $fileTmpPath = $_FILES['u_photo']['tmp_name'];
    $fileData = file_get_contents($fileTmpPath);
    $photoBase64 = base64_encode($fileData);

    //encriptado
    $enc_pass = sha1($passwd);
   
    $sql_valid_mail = "
        SELECT 
            COUNT(email) as total
        FROM
            users
        WHERE
            email = '$email'
            LIMIT 1
    ";
    $res = pg_query($conn, $sql_valid_mail);

    if($res){
        $row = pg_fetch_assoc($res);
        if($row['total'] > 0){
            echo "Email already exists";
        }else{
            $sql = "INSERT INTO users (firstname, lastname, email, password, photo)
            VALUES('$fname','$lname','$email','$enc_pass','$photoBase64')
            ";

            $res = pg_query($conn, $sql);

            if($res){

                echo "<script>alert('Users has been created succesfully. Go to login!')</script>";
                header('Refresh: 0; URL=http://localhost/schoolar2/src/login.php');//login.php
            }else{
                echo "Error";
            }
        }
    }

?>