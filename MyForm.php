<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php

$name = "";
$email = "";
$website = "";
$comment = "";
$gender = "";
$nameErr = "";
$emailErr = "";
$websiteErr = "";
$genderErr = "";
$title = "";
$personalized = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])) {
        $nameErr = "Name is Required";
    } else {
        $name = test_input($_POST["name"]);
    } if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only Letters and white spaces allowed";
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is Required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid Email Type";
        }
    }
    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
    } if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
        $websiteErr = "Invalid URL";
    }
    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is Required";
    } else {
        $gender = test_input($_POST["gender"]);
    } 

    if($gender == "male") {
        $title = "Mr.";
    } else {
        $title = "Ms.";
    }

    if (empty($_POST["comment"])) {
        $personalized = "The ads will not be personalized for your personal preference due to no comment given.";
    } else {
        $personalized = "Your comment will be used to provide personalized ads to your mail, for the products you are intrested in.";
    }
}
?>


<div class="Main">
    <H1>Welcome To OneStop</H1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div>
         <h4 class="Categories">Name:<?PHP echo " *" . $nameErr; ?></h4>
        <input type="text" name="name" value="<?PHP echo $name; ?>">
    </div>
    <div>
        <h4 class="Categories">Email:<?PHP echo " *" . $emailErr; ?></h4>
        <input type="email" name="email" value="<?PHP echo $email ?>">
    </div>
    <div>
        <h4 class="Categories">Website:<?PHP echo " *" . $websiteErr; ?></h4>
        <input type="text" name="website" value="<?PHP echo $website; ?>">
    </div>
    <div>
        <h4 class="Categories">Comment:</h4>
        <textarea name="comment" cols="40" rows="5"><?PHP echo $comment; ?></textarea>
    </div>
    <div>
        <h4 class="Categories">Gender:<?PHP echo " *" . $genderErr; ?></h4>
        <input type="radio" name="gender" value="male" <?PHP if(isset($gender) && $gender == "male") echo "checked"; ?>>Male
        <input type="radio" name="gender" value="female" <?PHP if(isset($gender) && $gender == "female") echo "checked"; ?>>Female
    </div>
    <div class="submitBtn">
    <input type="submit" name="submit" value="Subscribe" class="submitEl">
        <!-- <button  class="WelcomeEl">Welcome</button> -->
    </div>
    </form>
    <button  class="WelcomeEl">Welcome</button>
</div>

<div class="Message active">
    <h3>HI, Thank you for subscribing to our website <?php echo $title . $name; ?>. </h3>
    <h3>You will be obtaining special discounts and offers to your following email: <?php echo $email; ?>.</h3>
    <h3><?php echo $personalized; ?></h3>
</div>


<script src="Script.js"></script>
</body>
</html>

