<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Booking Laboratorium</title>

    <link rel="stylesheet" type="text/css" href="./assets/css/login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="login-container">

        <div class="login-box">

            <h2>Login</h2>

            <p class="subtitle">
                Booking Laboratorium
            </p>

            <form action="proses_login.php" method="POST">

                <div class="input-box">
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="Username"
                        required
                    >
                </div>

                <div class="input-box">
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Password"
                        required
                    >
                </div>

                <button type="submit">
                    Login
                </button>

            </form>

        </div>

    </div>

</body>
</html>