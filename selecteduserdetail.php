<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);




    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")'; 
        echo '</script>';
    }
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';
        echo '</script>';
    }
    
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Hurray! Transaction is Successful');
                                     window.location='transactions.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Customers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
body {
            font-family: Arial, sans-serif;
            margin: 0px;
            padding: 0px;
            background-image: url("images/bg2.jpg");
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


        .copyright {
        
        bottom: 0;
        left: 0;
        top: 100px;
        width: 100%;
        padding: 10px;
        text-align: center;
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
        <h1 class="title">Transfer Amount</h1>
        <div class="about">
            <h4>Transfer any amount in a spark.</h4>
    </div>
        
</body>



<?php
    include 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
?>

<div class="table3">
<?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr style="color : white;">
                    <th class="text-center">Account No.</th>
                    <th class="text-center">Account Name</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Account Balane(in Rs.)</th>
                </tr>
                <tr style="color : white;">
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label style="color : white;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose account</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : white;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn" >Transfer Money</button>
            </div>
        </form>
    </div>

<div class="copyright">
    <p>&copy 2023  <b>Sudhanshu Pandit</b> </br></p>
</div>
</html>