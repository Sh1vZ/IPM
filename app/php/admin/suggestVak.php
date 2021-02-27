<?php  
  
  include(dirname(__FILE__) . "/../conn.php");
      
    $company    = $_GET['docent'];   
    $sql        = "SELECT docent_ID, Vak_docent, docent_naam from vakken, docenten where vakken.Vak_docent=docenten.docent_ID";  
      
    $res        = $db->query($sql);  
      
    if(!$res)  {
        echo mysqli_error($db);  
    }
       
    else  {
        while( $row = $res->fetch_object() )  
        echo "<option value=" . $row['docent_ID'] . ">" . $row['docent_naam'] . "</option>";
    }
        
          
?>  