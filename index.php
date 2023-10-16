<!DOCTYPE html>
<html>
<head>
    <title>Sparks Bank</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0px;
            padding: 0px;
            background-image: url("images/bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        
        .navbar {
            background-color: #191970;
            padding: 10px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .navbar ul li {
            margin: 0 10px;
        }
        
        .navbar ul li a {
            text-decoration: none;
            color: #FFFFFF;
            font-weight: bold;
            position: relative;
        }
        
        .navbar ul li a:hover {
            color: #ff6600;
        }
        
        .navbar ul li a::before {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #ff6600;
            transform: scaleX(0);
            transition: transform 0.3s ease-in-out;
        }
        
        .navbar ul li a:hover::before {
            transform: scaleX(1);
        }
        
        .navbar .logo {
        margin-right: 10px;
        }
    
        .navbar .logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        
        .container {
            color: #FFFFFF;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .title {
            
            font-size: 70px;
            font-weight: bold;
            color: #FFFFFF;
            margin-bottom: 20px;
        }
        
        .about {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        
        .buttons button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background-color: #ff6600;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .buttons button:first-child {
            margin-right: 40px;
        }
        .buttons button:hover {
            background-color: #ff8533;
            
        }
        
        .box {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .box img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 60px;
            margin-left: -10px;
        }


        .box img:last-child {
            margin-right: 30px;
            margin-left: 40px;
        }
        
        .box p {
            margin-top: 10px;
            font-weight: bold;
        }
        .disclaimer {
            align-items: center;
            margin-top: 200px;
            padding: 10px 50px;
            font-size: 15px;
            margin-left: 50px;
        }

        .copyright {
        
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 10px;
        text-align: center;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
        <li class="logo"><a href="index.php"><img src="images/logo.png" alt="Logo"></a></li>
            <li><a href="index.php">Sparks Bank</a></li>
            <li><a href="customers.php">Customers</a></li>
            <li><a href="transactions.php">Transfer History</a></li>
        </ul>
    </div>
    
    <div class="container">
        <h1 class="title">Sparks Bank</h1>
        
        <div class="about">
            <h3>Welcome to Sparks Bank! We are a leading banking institution committed to providing secure and convenient financial services to our customers.</h3>
            <h3>With our user-friendly online platform, you can easily manage your accounts, make transactions, and track your finances.</h3>
        </div>
        
        <div class="box">
            <img src="images/money.jpg" alt="Box 1">
            <img src="images/transactions.jpg" alt="Box 2">
        </div>
        
        <div class="buttons">
            <button class="nav-link active" aria-current="page" onclick="window.location.href='customers.php'">Transfer Money Now!</button>
            <button class="nav-link active" aria-current="page" onclick="window.location.href='transactions.php'">See the Transactions Made!</button>
        </div>

        <div class="disclaimer">
        <p1>This website is the outcome of a intern project, and does not necessarily represent any organisation or any other individuals referenced or acknowledged within the website.</p1>
        <p2>Anyone may reproduce, distribute, adapt, translate the content on the website, without explicit permission, provided that the content is accompanied by an acknowledgement that Spark Bank website is the source and that it is clearly indicated if changes were made to the original content.</p2>
        </div>

        <div class="copyright">
        <p>&copy 2023  <b>Sudhanshu Pandit</b> </br></p>
        </div>