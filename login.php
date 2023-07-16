<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css" />



</head>

<body>
    <div class="login-page">
        <div class="form">
            <form method="POST" action="auth.php" class="login-form">
                <h1>Login </h1>
                <div class="form-group">
                    <label >Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="Pas">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button>Masuk</button>
                <p class="message">Belum punya akun? <a href="register.php">Daftar disini</a></p>
            </form>
        </div>
    </div>

</body>

</html>