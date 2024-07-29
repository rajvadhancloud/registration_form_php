<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Sign up</h1>
    <Form action = "<?php $_SERVER["PHP_SELF"]?>" method = "post">
        <label>Username:</label>
        <input type = "text" name = "username" placeholder = "enter username">
        <label>Password:</label>
        <input type="password" name = "password" placeholder = "enter password">
        <input type = "submit" value = "signup" name="signup">
    </form>
    <a href="signin.php">Signin</a>
</body>
</html>

<?php
    
    if(isset($_POST["signup"])){
        if(!empty($_POST["username"] && !empty($_POST["password"]))){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $hash_password = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO admins (admin,password) VALUES('$username','$hash_password')";
            try{
                mysqli_query($connection,$sql);
                echo "user added succesfully";
            }
            catch(mysqli_sql_exception){
                echo "unable to add user";
            }
        }
        else{
            echo "username or password missing";
        }
    }
?>