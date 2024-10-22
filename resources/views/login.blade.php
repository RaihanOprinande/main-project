<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Payakumbuh Kota Randang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #ffffff; /* Background color set to white */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff; /* Set container background to match body */
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            width: 800px;
            overflow: hidden;
        }

        .left-panel {
            padding: 40px;
            width: 50%;
        }

        .right-panel {
            background-color: #ffffff; /* Set right panel background to match body */
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .right-panel img {
            width: 80%; /* Image size can be adjusted */
            height: auto;
        }

        h2 {
            color: #333333; /* Change header color to a darker shade for contrast */
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #333333; /* Change label color to a darker shade for contrast */
        }

        .input-field {
            margin-bottom: 20px;
        }

        .input-field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 14px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #000000; /* Change button color to black */
            color: white; /* Keep text color white for contrast */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #333333; /* Darker shade on hover */
        }

        .forgot-password {
            display: block;
            margin-top: 10px;
            text-align: right;
            color: #000000; /* Change "Forgot Password?" color to black */
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password:hover {
            text-decoration: underline; /* Optional: Add underline on hover */
        }

        .title {
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 20px;
            font-size: 16px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>

<div class="login-container">
    <!-- Left panel (login form) -->
    <div class="left-panel">
        <div class="title">
            <h2>LOGIN</h2>
        </div>
        <div class="subtitle">
            <p>Toko Sepatu</p>
        </div>
        <form action="#" method="POST">
            <div class="input-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="example@gmail.com" required>
            </div>
            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <a href="#" class="forgot-password">Forgot Password?</a>
        </form>
    </div>

    <!-- Right panel (image) -->
    <div class="right-panel">
        <img src="images/logo.jpeg" alt="Sepatu"> <!-- Update this to the correct image path -->
    </div>
</div>

</body>
</html>
