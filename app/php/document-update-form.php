<?php
include("conn.php");

if (isset($_POST['getDocument'])) {
	$id = $_POST['id'];
	$sql = "SELECT * FROM template WHERE stud_ID=$id";
	$res = mysqli_query($conn, $sql);
	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$Anaam   = $row['Path'];
			$Vnaam   = $row['naam'];

?>
			<form method="post" id="documentenUpdate">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title" id="modal-title-default">Document Registratie</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="" id="districten-form">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">INPUT</label>
										<div class="input-group input-group-merge">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-map-marker"></i></span>
											</div>
											<input class="form-control" placeholder="Input 1" name="naam" id="naamU" type="text">
										</div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label for="">File:</label>
										<div class="input-group input-group-merge">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
											</div>
											<input class="form-control" name='path' placeholder="Input 1" id="pathU" type="file" accept=".xls,.xlsx">
										</div>
									</div>
								</div>
							</div>

							<div class="modal-footer">
								<button type="button" onclick=updateDocument(<?= $id; ?>) class="btn btn-primary">Bijwerken </button>
								<button type="button" class="btn btn-danger  ml-auto" data-dismiss="modal">Sluiten</button>
							</div>
						</form>

			<?php
		}
	}
}
			?>

			<!-- <script src="../../app/js/ajax-script.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){  
	load_data();

}); -->