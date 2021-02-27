<?php

include("conn.php");

$fetchData= fetch_data($conn);
show_data($fetchData);
// fetch query
function fetch_data($conn){
  $query="SELECT * from template";
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
        <th>Path</th>
        <th>Naam</th>
        <th></th>
        </tr>
        </thead>';

 if(count($fetchData)>0){
      $sn=1;
      foreach($fetchData as $data){ 

  echo "<tbody>
            <tr id='delete'>
          <td>".$sn."</td>
          <td>".$data['Path']."</td>
          <td>".$data['naam']."</td>
          <td class='table-actions'>
          
         
          <td><button type='button' name='edit' class='btn btn-primary btn-md edit' value=".$data['temp_ID'].">Bewerken</button>
      <button type='button' name='deleteDoc' class='btn btn-danger btn-md delete' value=".$data['temp_ID'].">Verwijderen</button>
      </td>
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
