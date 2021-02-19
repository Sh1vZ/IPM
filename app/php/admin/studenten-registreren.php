
<?php
require "../../../vendor/autoload.php";
include 'generateStudentenkaart.php';
include '../conn.php';
$db = $conn; // database connection  

//legal input values
$Anaam     = legal_input($_POST['Anaam']);
$Vnaam     = legal_input($_POST['Vnaam']);
$GebDatum  = legal_input($_POST['GebDatum']);
$GebPlaats  = legal_input(($_POST['GebPlaats']));
$Email     = legal_input(($_POST['Email']));


if (!empty($Anaam) && !empty($Vnaam) && !empty($GebDatum) && !empty($GebPlaats) && !empty($Email)) {
    //  Sql Query to insert user data into database table
    Insert_data($Anaam, $Vnaam, $GebDatum, $GebPlaats, $Email);
} else {
    echo "All fields are required";
}


// convert illegal input value to ligal value formate
function legal_input($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

// // function to insert user data into database table
function insert_data($Anaam, $Vnaam, $GebDatum, $GebPlaats, $Email)
{
    global $db;
    $pin = rand(100000, 999999);
    $b = generateQrcode($Anaam, $Vnaam, $pin);
    $a = Generate($Anaam, $Vnaam, $GebDatum, $Email, $b);
    $query = "INSERT INTO studenten(Voornaam,Achternaam,Geboortedatum,Geboorteplaats,Student_email,Student_pincode,img) VALUES('$Anaam','$Vnaam','$GebDatum','$GebPlaats','$Email','$pin','$a')";

    $execute = mysqli_query($db, $query);
    if ($execute == true) {
        header("Location:../../../pages/admin/studenten.php");
    } else {
        echo  "Error: "  . mysqli_error($db);
    }
}
