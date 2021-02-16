<div id="recordModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="recordForm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" 
data-dismiss="modal">×</button>
					<h4 class="modal-title"><i 
class="fa fa-plus"></i> Add Record</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name" class="control-label">Name</label>
						<input type="text" class="form-control" 
id="name" name="name" placeholder="Name" required>			
					</div>
					<div class="form-group">
						<label for="age" class="control-label">Age</label>							
						<input type="number" class="form-control" 
id="age" name="age" placeholder="Age">							
					</div>	   	
					<div class="form-group">
						<label for="lastname" class="control-label">Skills</label>							
						<input type="text" class="form-control"  
id="skills" name="skills" placeholder="Skills" required>							
					</div>	 
					<div class="form-group">
						<label for="address" class="control-label">Address</label>							
						<textarea class="form-control" 
rows="5" id="address" name="address"></textarea>							
					</div>
					<div class="form-group">
						<label for="lastname" class="control-label">Designation</label>							
						<input type="text" class="form-control" 
id="designation" name="designation" placeholder="Designation">			
					</div>						
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
					<input type="hidden" name="action" id="action" value="" />
					<input type="submit" name="save" id="save" 
class="btn btn-info" value="Save" />
					<button type="button" class="btn btn-default" 
data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>