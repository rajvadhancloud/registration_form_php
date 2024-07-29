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

    <h1>Sign in</h1>
    <Form action = "<?php $_SERVER["PHP_SELF"]?>" method = "post">
        <label>Username:</label>
        <input type = "text" name = "username" placeholder = "enter username">
        <label>Password:</label>
        <input type="password" name = "password" placeholder = "enter password">
        <input type = "submit" value = "signin" name="signin">
    </form>
    <a href="signup.php">Sign up</a>
</body>
</html>

<?php
    
    if(isset($_POST["signin"])){
        if(!empty($_POST["username"] && !empty($_POST["password"]))){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $sql = "SELECT * FROM admins WHERE admin = '$username'";
            try{
                $result = mysqli_query($connection,$sql);
                $row = mysqli_fetch_assoc($result);
                $pass = $row["password"];
                if($username != $row["admin"]){
                    echo "wrong username";
                }
                elseif(password_verify($password,$pass)){
                    echo "login succesfully";
                }
                else{
                    echo "incorrect password";
                }
            }
            catch(mysqli_sql_exception){
                echo "unable to signin";
            }
        }
        else{
            echo "username or password missing";
        }
    }
?>