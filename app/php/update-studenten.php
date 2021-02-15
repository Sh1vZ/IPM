 <?php

include('conn.php');


if(isset($_GET['editId'])){
   $id= $_GET['editId'];
    edit_data($conn, $id);
}


if(isset($_POST['updateId'])){
   $id= $_POST['updateId'];
   update_data($conn,$id);
}
// edit data query

function edit_data($conn, $id){
    $query="SELECT * from studenten WHERE stud_ID=$id";
    $exec=mysqli_query($conn, $query);

    $row=mysqli_fetch_assoc($exec);
    echo json_encode($row);

    $Achternaam= $row['Achternaam'];
      $Voornaam= $row['Voornaam'];
      $Geboortedatum =$row['Geboortedatum'];
      $Geboorteplaats =$row['Geboorteplaats'];
      $Student_email = $row['Student_email'];
                
    
} ?>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
						<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h6 class="modal-title" id="modal-title-default">Studenten Registratie</h6>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" id='toevoegen' aria-current="page" href="#">Toevoegen</a>
									</li> 
									
								 </ul> 
								<html>
								<body>
								<div class="modal-body">
								<p id="msg"></p>
									<form  action="" id="updateForm" method= "POST" >
										<div class="row">
                                        <input type="hidden" name="id" id="updateId">
										
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Achternaam:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-user"></i></span>
														</div>
														<input name="Anaam" id="Anaam" class="form-control" placeholder="Input 1"  type="text" value='<?=$Achternaam;?>' >
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Voornaam:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-user"></i></span>
														</div>
														<input name="Vnaam" id="Vnaam" class="form-control" placeholder="Input 1"  type="text" value='<?=$Voornaam;?>' >
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Geboorte Datum:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-calendar"></i></span>
														</div>
														<input name="GebDatum" id="GebDatum" class="form-control" placeholder="Input 1"  type="date" value='<?=$Geboortedatum;?>'>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Geboorte Plaats:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
														</div>
														<input name="GebPlaats" id="GebPlaats"class="form-control" placeholder="Input 1"  type="text" value='<?=$Geboorteplaats;?>' >
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="">Email:</label>
													<div class="input-group input-group-merge">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
														</div>
														<input name="Email" id="Email" class="form-control" placeholder="Input 1"  type="email" value='<?=$Student_email;?>' >
													</div>
												</div>
											</div>
										</div>

										<div class="modal-footer">
											<button type="submit" name="submit" onclick=UpdateProject(<?=$id;?>) class="btn btn-success ">Toevoegen</button>
											<button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
										</div>
									</form>

									<?php

// update data query
function update_data($conn, $id){

      $Anaam= legal_input($_POST['Anaam']);
      $Vnaam= legal_input($_POST['Vnaam']);
      $GebDatum = legal_input($_POST['GebDatum']);
      $GebPlaats = legal_input($_POST['GebPlaats']);
      $Email = legal_input($_POST['Email']);

      $query="UPDATE studenten
              SET Achternaam='$Anaam',
                  Voornaam='$Vnaam',
                  Geboortedatum= '$GebDatum',
                  Geboorteplaats='$GebPlaats'
                  Student_email='$Email' WHERE stud_ID=$id";

      $exec= mysqli_query($conn,$query);
  
      if($exec){
        
         echo "data was updated"; 
        
      }else{
         $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
         echo $msg; 
      }
}
   

// convert illegal input to legal input
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>
</body>
								</html>