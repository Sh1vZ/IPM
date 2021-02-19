 <?php

include("conn.php");

$fetchData= fetch_data($conn);
show_data($fetchData);
// fetch query
function fetch_data($conn){
  $query="SELECT * from studenten";
  $exec=mysqli_query($conn, $query);
  if(mysqli_num_rows($exec)>0){

    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}


function show_data($fetchData){


 echo '<table id="studentendata" class="table align-items-center table-flush table-striped">
 <thead class="thead-light">
        <tr>
        <th>#</th>
        <th>Achternaam</th>
        <th>Voornaam</th>
        <th>Geboortedatum</th>
        <th>Geboorteplaats</th>
        <th>Email adres</th>
        <th></th>
        </tr>
        </thead>';

 if(count($fetchData)>0){
      $sn=1;
      foreach($fetchData as $data){ 

  echo "<tbody>
            <tr>
          <td>".$sn."</td>
          <td>".$data['Achternaam']."</td>
          <td>".$data['Voornaam']."</td>
          <td>".$data['Geboortedatum']."</td>
          <td>".$data['Geboorteplaats']."</td>
          <td>".$data['Student_email']."</td>
          <td class='table-actions'>
          <button type='button' name='update' id='".$data["stud_ID"]."'
 class='btn btn-warning btn-xs update'>Update</button>
          <a class='link' href='#' class='table-action' data-original-title='Verwijderen' name='delete' id='(".$data['stud_ID'].")'><i class='fas fa-trash' data-toggle='tooltip' data-placement='top' title='Verwijderen'></i></i></a>
         
          </td>  
        </tr>
        </tbody>";
       
  $sn++; 
     }
}else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/ajax-script.js"></script>
