<!DOCTYPE html>
<html>
<head>
	<title>Exam CRUD Function</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>


	<div class="container-fluid">
		<div class="jumbotron">
				<button class="btn btn-success btn-add"> Add </button>
				<table class="table table-bordered">
				  <thead>
				    <tr>
				      <th scope="col">TITLE</th>
				      <th scope="col">ISBN</th>
				      <th scope="col">AUTHOR</th>
				      <th scope="col">PUBLISHER</th>
				      <th scope="col">YEAR PUBLISHED</th>
				      <th scope="col">CATEGORY</th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody id="table_body">
				  </tbody>
				</table>
		</div>	
	</div>

	<!-- Add Modal --> 
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Add Textbook</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        	 <form>
					  <div class="form-group">
					    <label>Title <span class="required-class">*</span> </label>
					    <input type="text" class="form-control" id="title">
					  </div>
					  <div class="form-group">
					    <label>ISBN <span class="required-class">*</span></label>
					    <input type="text" class="form-control" id="isbn">
					  </div>
					  <div class="form-group">
					    <label>Author <span class="required-class">*</span></label>
					    <input type="text" class="form-control" id="author">
					  </div>
					  <div class="form-group">
					    <label>Publisher <span class="required-class">*</span></label>
					    <input type="text" class="form-control" id="publisher">
					  </div>
					  <div class="form-group">
					    <label>Year Published <span class="required-class">*</span></label>
					    <input type="number" class="form-control" id="year_published">
					  </div>
					  <div class="form-group">
					    <label>Category <span class="required-class">*</span></label>
					    <input type="text" class="form-control" id="category">
					  </div>

				 </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success btn-save-textbook">Save</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>


    <!-- Edit Modal --> 
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Edit Textbook</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        	 <form>
	        	 	  <input type="hidden" id="textbook_id_edit">
					  <div class="form-group">
					    <label>Title <span class="required-class">*</span> </label>
					    <input type="text" class="form-control" id="title_edit">
					  </div>
					  <div class="form-group">
					    <label>ISBN <span class="required-class">*</span></label>
					    <input type="text" class="form-control" id="isbn_edit">
					  </div>
					  <div class="form-group">
					    <label>Author <span class="required-class">*</span></label>
					    <input type="text" class="form-control" id="author_edit">
					  </div>
					  <div class="form-group">
					    <label>Publisher <span class="required-class">*</span></label>
					    <input type="text" class="form-control" id="publisher_edit">
					  </div>
					  <div class="form-group">
					    <label>Year Published <span class="required-class">*</span></label>
					    <input type="number" class="form-control" id="year_published_edit">
					  </div>
					  <div class="form-group">
					    <label>Category <span class="required-class">*</span></label>
					    <input type="text" class="form-control" id="category_edit">
					  </div>

				 </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-info btn-update-textbook">Update</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>


    <!-- Delete Modal --> 
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Delete Textbook</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	Are you sure you want to delete this textbook?
	      	<input type="hidden" id="textbook_id">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger btn-delete-textbook">Yes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script/script.js"></script>
</body>
</html>