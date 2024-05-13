<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - AnimeVault</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="container">
        <h1>Login to AnimeVault</h1>
        <div id="login">
            <form action="loginHTML.php" method="post">
                <label for="username">Username: </label><br>
                <input type="text" id="username" name="username" /><br>
                
                <label for="password">Password: </label><br>
                <input type="password" name="password" id="password" /><br>
                
                <div id="display">
                    <?php

                    session_start();

                    include 'connection.php';

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $sql = "SELECT * FROM users_table WHERE username = '$username'";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $hashed_pass = $row['hashed_password'];

                                if (password_verify($password, $hashed_pass)) {
                                    session_start();
                                    $_SESSION['username'] = $username;
                                    header('Location: choose.php');
                                    exit();
                                } else {
                                    echo "Incorrect password";
                                }
                            } else {
                                echo "Username not found";
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }
                    ?>
                </div>

                <div id="loginDiv">
                    <button id="loginBtn" onclick="validate();">Login</button>
                </div>
            </form>

            <div id="signUp">
                <p>Don't have an account? <a href="signupHTML.php" id="signupText">Sign Up</a></p>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
