<div class="modal fade" id="viewTypes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" data-backdrop="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       		 <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Pick Project Type</h4>
      </div>
      <div class="modal-body">
	      	<div class="form-group">
				<?php echo Form::input('search','',
					array('class' => 'col-md-4 form-control', 'placeholder'=>'Search...' ,'onkeyup'=>'myFunction2()', 'id'=>'myInput2'));
			    ?>

			</div>
	       <?php 
	       		$types = Model_ProjectType::find_all();
	       		if ($types): 
	       	?>
			<table class="table table-striped" id="myTable2">
				<thead>
					<tr>
						
						<th>Type Name</th>
					
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($types as $item): ?>		
						<tr>
							<td><?php echo $item->name; ?></td>
							
							<td>
							<div class="btn-toolbar">
								<div class="btn-group">
								<button type="button" class="btn btn-info btn-small" onclick="pickBranch2('<?php echo $item->name; ?>')"> Pick
									</button>
								</div>
								</div>

							</td>
						</tr>
				<?php endforeach; ?>	
			</tbody>
			</table>

		<?php else: ?>
		<p>No Project Types.</p>

		<?php endif; ?>
      </div>
            
    </div>
  </div>
</div>
<script>
	function pickBranch2(name)
	{
		document.getElementById('project_type').value=name;
		document.getElementById('project_type_code').value=name;
	
		
		$('#viewTypes').modal('hide');
		
	}
	
	function myFunction2() 
	{
	  // Declare variables 
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("myInput2");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable2");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
	    td = tr[i].getElementsByTagName("td")[0];
	    
	    if (td) {
	      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	        tr[i].style.display = "";
	      } else {
	        tr[i].style.display = "none";
	      }
	    } 
	  }
	}
</script>
	
	

