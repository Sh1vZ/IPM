<?php
include(dirname(__FILE__) . "/../conn.php");
require "../../../vendor/autoload.php";


session_start();
if (isset($_POST["cijf"])) {
  $id = $_SESSION['stud_ID'];
  $per = $_POST['periode'];
  $rid = "SELECT KlasID from studentklas WHERE StudentID=$id";
  $resr = mysqli_query($conn, $rid);
  if (mysqli_num_rows($resr) > 0) {
    while ($row = mysqli_fetch_assoc($resr)) {
      $kid   = $row['KlasID'];
    }
  }
  $sql = "SELECT Achternaam,Voornaam,Vaknaam,Klas,Periode,Cijfer FROM `cijfers` as c inner join klassen as k on c.klas_id=k.ID INNER JOIN studenten as s on c.student_id=s.stud_ID INNER JOIN vakken as v on c.VakID=v.vak_ID where c.Periode=$per and c.student_id=$id and c.klas_id=$kid";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
?>
    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      td,
      th {
        border: 1px solid green;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: green;
      }
    </style>
    <div id="data">
      <img src="../../../assets/img/brand/favicon.png" width="100px" height="100px" alt="">
      <h1 style="text-align:center">Schooljaar:2020/2021</h1>
      <hr>
      <table>
        <tr>
          <th>Vak</th>
          <th>Cijfer</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
          $anaam=$row['Achternaam'];
          $vnaam=$row['Voornaam'];
          $klas=$row['Klas'];
        ?>

          <tr>
            <td><?= $row['Vaknaam'] ?></td>
            <td><?= $row['Cijfer'] ?></td>
          </tr>

    <?php
        }
      echo "Naam:$anaam $vnaam";
      echo "</br>";
      echo "Klas:$klas";
      echo "</br>";
      echo "Periode:$per";
      echo "</br>";
      echo "</br>";
      }else{
        echo "geen resultaten";
      }
    }
    ?>
      </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./script/html2pdf.bundle.js"></script>
    <script>
      $('document').ready(function() {
        var element = document.getElementById('data');
        var opt = {
          margin: 0.5,
          filename: 'cijferlijst.pdf',
          html2canvas: {
            scale: 2
          },
          jsPDF: {
            unit: 'in',
            format: 'letter',
            orientation: 'portrait'
          }
        };
        html2pdf().from(element).set(opt).toPdf().get('pdf').then(function(pdf) {
          window.open(pdf.output('bloburl'), '_self');
        });
      });
    </script>