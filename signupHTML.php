<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup - AnimeVault</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="container">
        <h1>Sign Up for AnimeVault</h1>
        <div id="signup">
            <form action="signupHTML.php" method="post">

                <label for="username">Username: </label><br>
                <input type="text" id="username" class="username" name="username" /><br>
                
                <label for="password">Password: </label><br>
                <input type="password" name="password" id="password"/><br>
                
                <label for="re-password">Re-type Password: </label><br>
                <input type="password" name="re-password" id="re-password" /><br>

                <div id="display">
                <?php
                  include 'connection.php';

                  if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $re_password = $_POST['re-password'];

                    if ($password !== $re_password) {
                        echo "Passwords do not match";
                        
                    } else {
                        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

                    $check = "SELECT * FROM  users_table where username = '$username'";
                    $result = mysqli_query($conn, $check);

                    if(mysqli_num_rows($result) > 0) {
                        echo "Username already exists";
                    } else {
                        $sql = "INSERT INTO users_table (username, hashed_password) VALUES ('$username', '$hashed_pass')";

                        if(mysqli_query($conn, $sql)) {
                            header('Location: loginHTML.php');
                            exit();
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }
                  }
                }
                ?>
                
                </div>
                <div id="signupDiv">
                    <button id="signupBtn" onclick=" return validate();">Sign up</button>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
