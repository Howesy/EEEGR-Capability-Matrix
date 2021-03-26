<?php

session_start();
include_once("../Core/databaseCoordinate.php");
include_once("../Utility/extraUtility.php");

if (isset($_SESSION["loggedIn"]))
{
    header("location: companyCapability.php");
}

if (isset($_POST["login"]))
{
    $databaseCoordinate = new DatabaseCoordinate("eeegr");
    $dataHandler = new DataHandler();

    $postedCompanyName = $_POST["companyName"];
    $postedCompanyPassword = $_POST["companyPassword"];

    $suppliedInformation = array(
        "companyName" => "",
        "companyPassword" => ""
    );

    $constructedErrors = "";

    if (!$dataHandler->VerifyPostedData($postedCompanyName)) 
    {
        $constructedErrors .= "You didnt include a company name! | ";
    } else $suppliedInformation["companyName"] = $postedCompanyName;

    if (!$dataHandler->VerifyPostedData($postedCompanyPassword))
    {
        $constructedErrors .= "You didnt include a company password!";
    } else $suppliedInformation["companyPassword"] = $postedCompanyPassword;

    if (!empty($constructedErrors))
    {
        WebsiteAlert("Errors Detected: $constructedErrors");
    } 
    else
    {
        $suppliedCompanyName = $suppliedInformation["companyName"];
        $suppliedCompanyPassword = $suppliedInformation["companyPassword"];
        if ($databaseCoordinate->companyAccount->CheckLoginAttempt($suppliedCompanyName, $suppliedCompanyPassword))
        {
            $_SESSION["loggedIn"] = true;
            $_SESSION["companyName"] = $suppliedCompanyName;
            header("location: companyCapability.php");
        } else WebsiteAlert("Sorry, that company doesnt exist in the EEEGR capability matrix database.");
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>[EEEGR] Capability Matrix - Login</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../examples-css.css" type="text/css">
        <script src="../w3.js"></script>
        <link rel="stylesheet" type="text/css" href="./CSS/login.css">
        
    </head>

    <body>
    <br><br>
        <div class="yh">
          <h3>Please enter your company details:</h3>

          <!-- This is the form that is used to log in 
          to gain access to the form which updates company 
          information and to view the member database -->

        <form method="POST" action="login.php">
          <div>
            <label for="companyName">Company Name: </label><br>
            <input class="yh" type="text" id="UserEmail" placeholder="Enter your company name!" name="companyName">
          </div>

          <div>
            <label for="companyPassword">Password:</label><br>
            <input class="yh" type="password" id="userPassword" placeholder="Enter your company password!" name="companyPassword">
          </div>

          <button type="submit" name="login">Log in</button>
        </form>
        </div>

        <!-- This link will send users to the form where 
        they can create an account to access the 
        form to update Company information. This form
        should be kept private and the companies log
        in details should be sent to them privetly to 
        prevent random people from updating company information -->
        <div>
          <a href="accountCreation.php">Don't have an account? Signup here</a>
        </div>


    </body>
</html>
