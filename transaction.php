<?php
    // connect to database
    $conn = mysqli_connect('localhost', 'ahmed', 'test@123', 'banking');

    // check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    //getting id from url
    if(isset($_GET['id'])){
        $customerID = mysqli_real_escape_string($conn, $_GET['id']);
    }
    else
        echo "error";

    $sql = "SELECT id, title, email, balance FROM customers WHERE id = '$customerID';";

    // make query and get result
    $result = mysqli_query($conn, $sql);

    // fetch the resut rows as an array
    $customer = mysqli_fetch_row($result);

    //print($customer[2]);

    $sql ='SELECT id, title, balance FROM customers;';

    // make query and get result
    $result = mysqli_query($conn, $sql);

    // fetch the resut rows as an array
    $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css\frontpage.css">    

<style>

    .styled-table {
        border-collapse: collapse;
        margin: 25px 65px;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        width: 1400px;
    }

    .styled-table thead tr {
        background-color: #3f3f3f;
        color: #ffffff;
        text-align: left;
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #3f3f3f;
    }
    .styled-table thead td:hover {
        font-weight: bold;
        color: #333;
    }

    /* Form style */

    /* Add styles to the form container */
    .container {
      margin: 60px 375px;
      max-width: 700px;
      padding: 16px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      border-radius: 5px;
    }

    /* Full-width input fields */
    input[type=text], select {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus {
      background-color: #eee;
      outline: none;
    }

    /* Set a style for the submit button */
    .btn {
      background-color: #3f3f3f;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 1;
    }

    .btn:hover {
      opacity: 0.9;
    }

</style>
</head>
<body>

    <div class="row" style="top: 0">
    
    
        <div class="navbar col-12" style="padding-left: 20px; padding-right: 20px; ">
            <a href="index.html"><img id="img" style="width: 55%" src="SparksImages/logo.svg"></a> 
            <a style="padding-top: 28px; float: right;" href="#">Contact Us</a>
            <a style="padding-top: 28px; float: right;" href="#">Invest</a>
            <a style="padding-top: 28px; float: right;" href="#">Services</a>
            <a style="padding-top: 28px; float: right;" href="transactionhistory.php">Transaction History</a>
            <a style="padding-top: 28px; float: right;" href="customers.php">Customers</a>   
            <a style="padding-top: 28px; float: right;" href="index.html">Home</a>
        </div>
    </div>

    <h2 style="color: #333; padding-left: 630px;">TRANSACTION</h2>

    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Account Title</th>
                <th>E-mail</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <tr class='clickable-row' data-href='transaction.php?id=<?php echo $customers[$i]['id'] ?>'>
                <td><?php echo $customer[0] ?></td>
                <td><?php echo $customer[1] ?></td>
                <td><?php echo $customer[2] ?></td>
                <td><?php echo '$'. $customer[3] ?></td>
            </tr>
        </tbody>
    </table>

    <form action="transactionhistory.php" class="container" enctype="multipart/form-data" method="POST">
        <label for="title"><b>Transfer To:</b></label>
        <select id="account" name="account">
            <option value="" disabled selected>Choose account</option>
            <?php for($i = 0; $i < count($customers); $i++) {?>
            <?php if ($customers[$i]['id'] == $customerID) {continue;} ?>
            <option value="<?php echo $customers[$i]['id']?>"><?php echo $customers[$i]['id'] . '. ' . $customers[$i]['title'] . ', Balance: $' . $customers[$i]['balance']?>
            </option>
            <?php } ?>
        </select>

        <label for="description"><b>Amount:</b></label>
        <input type="text" placeholder="Enter amount" name="amount">

        <input type="hidden" name="senderid" value="<?php echo $customer[0] ?>"/>
        <input type="hidden" name="sender" value="<?php echo $customer[1] ?>"/>

        <button type="submit" name="submit" class="btn">TRANSFER</button>
    </form>

    <!-- Footer -->
    <div style="padding: 20px 40px 20px 40px" class="col-12 row footer">
    
        <div class="col-3">
            
            <ul style="list-style-type: none; font-size: 13px; line-height: 2em; color: #999999">
              <li>ABOUT US</li>
              <li>AWARDS AND ACHIVEMENTS</li>
              <li>FINANCIAL STATEMENTS</li>
              <li>NEWS AND MEDIA</li>
              <li>SPAEKING UP</li>
              <li>OUR CLIENTS AND FINANCIAL SYSTEM</li>
            </ul>

        </div>

        <div class="col-3">
            
            <ul style="list-style-type: none; font-size: 13px; line-height: 2em; color: #999999">
              <li>INVESTOR RELATIONS</li>
              <li>FINANCIAL STATEMENTS</li>
              <li>SUSTAINIBILTY</li>
              <li>FIGHTING FRAUD</li>
              <li>IMPORTANT INFORMATION</li>
            </ul>

        </div>

          

        <div class="col-3">
            
            <ul style="list-style-type: none; font-size: 13px; line-height: 2em; color: #999999">
              <li>SECURITY TIPS</li>
              <li>TERMS AND CONDITIONS</li>
              <li>PRIVACY POLICY</li>
              <li>COOKIE POLICY</li>
            </ul>

        </div>

          

        <div class="col-3">
          <div style="position: absolute; bottom: 20px; right: 70px">
          <div class="col-4"><a href="#" class="fa fa-facebook"></a></div>
          <div class="col-4"><a href="#" class="fa fa-twitter"></a></div>
          <div class="col-4"><a href="#" class="fa fa-linkedin"></a></div></div>
        </div></div>

</body>
</html>
