<?php
include(dirname(__FILE__) . "/../conn.php");

require "../../../vendor/autoload.php";
include 'generateStudentenkaart.php';

$db = $conn; // database connection  

if (isset($_POST["insert"])) {
    //legal input values
    $Anaam     = $_POST['Anaam'];
    $Vnaam     = $_POST['Vnaam'];
    $GebDatum  = $_POST['GebDatum'];
    $GebPlaats  = $_POST['GebPlaats'];
    $Email     = $_POST['Email'];

    global $db;
    $pin = rand(100000, 999999);
    $b = generateQrcode($Anaam, $Vnaam, $pin);
    $a = Generate($Anaam, $Vnaam, $GebDatum, $Email, $b);


    if (empty($Anaam) || empty($Vnaam) || empty($GebDatum) || empty($GebPlaats) || empty($Email)) {
        echo 'errorEmpty';
    } else {

        $sql = " INSERT INTO studenten(Voornaam,Achternaam,Geboortedatum,Geboorteplaats,Student_email,Student_pincode,img,Saldo) VALUES('$Vnaam','$Anaam','$GebDatum','$GebPlaats','$Email','$pin','$a', 0)";
        $execute = mysqli_query($db, $sql);
        if ($execute == true) {
            echo "success";
            // header("Location:../../../pages/admin/studenten.php");
        } else {
            echo  "Error: "  . mysqli_error($db);
        }
    }
}





if (isset($_POST['updateStudent'])) {
    $id = $_POST['id'];
    $Anaam = $_POST['Anaam'];
    $Vnaam = $_POST['Vnaam'];
    $GebDatum = $_POST['GebDatum'];
    $GebPlaats = $_POST['GebPlaats'];
    $Email = $_POST['Email'];
    // $page = $_SERVER['PHP_SELF'];
    // $sec = "10";
    // header("Refresh: $sec; url=$page");

    if (empty($Anaam) || empty($Vnaam) || empty($GebDatum) || empty($GebPlaats) || empty($Email)) {
        echo 'errorEmpty';
    } else {
        $sql = "SELECT img,Student_pincode FROM studenten WHERE stud_ID= ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "sqlError";
        } else {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($res)) {
                $img = $row['img'];
                $pin = $row['Student_pincode'];
            }
            $sql = "UPDATE studenten SET Achternaam=?,Voornaam=?,Geboortedatum=?, Geboorteplaats=?,Student_email=?,img=? WHERE stud_ID=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "sqlError";
            } else {
                if (unlink("../../uploads/studentenkaarten/" . $img . ".png")) {
                    $b = generateQrcode($Anaam, $Vnaam, $pin);
                    $a = Generate($Anaam, $Vnaam, $GebDatum, $Email, $b);
                    mysqli_stmt_bind_param($stmt, "ssssssi", $Anaam, $Vnaam, $GebDatum, $GebPlaats, $Email, $a, $id);
                    mysqli_stmt_execute($stmt);
                    if (mysqli_errno($conn) == 1062) {
                        echo "exist";
                    } else {
                        // header("Location:../../pages/admin/studenten.php");
                        echo "success";
                    }
                } else {
                   $b = generateQrcode($Anaam, $Vnaam, $pin);
                    $a = Generate($Anaam, $Vnaam, $GebDatum, $Email, $b);
                    mysqli_stmt_bind_param($stmt, "ssssssi", $Anaam, $Vnaam, $GebDatum, $GebPlaats, $Email, $a, $id);
                    mysqli_stmt_execute($stmt);
                    if (mysqli_errno($conn) == 1062) {
                        echo "exist";
                    } else {
                        // header("Location:../../pages/admin/studenten.php");
                        echo "success";
                    }
                }
            }
        }
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "SELECT img FROM studenten WHERE stud_ID= ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "sqlError";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($res)) {
            $img = $row['img'];
        }
        $sql = "DELETE FROM studenten WHERE stud_ID=? ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "sqlError";
        } else {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            if (unlink("../../uploads/studentenkaarten/" . $img . ".png")) {
                echo "success";
            } else {
                echo 'sqlError';
            }
        }
    }
}
