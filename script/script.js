$(document).ready(function(){
	getAllData();

	$('.btn-add').click(function(){
		$('#addModal').modal('show');
	});

	function getAllData(){

			$.ajax({
                url: 'route/route.php',
                type: 'POST',
                data:{
                    action: 'getAllTextbook',
                },
                success: function(data){

                	$('#table_body').html(data);

                }
            });

	}

	$('.btn-save-textbook').click(function(){

		var title = $('#title').val();
		var isbn = $('#isbn').val();
		var author = $('#author').val();
		var publisher = $('#publisher').val();
		var year_published = $('#year_published').val();
		var category = $('#category').val();

		if($.trim(title).length > 0 && $.trim(isbn).length > 0 && $.trim(author).length > 0 && $.trim(publisher).length > 0 && $.trim(year_published).length > 0 &&
			$.trim(category).length > 0){
			    $.ajax({
	                url: 'route/route.php',
	                type: 'POST',
	                data:{
	                    action: 'saveTextbook',
	                    title:title,
	                    isbn:isbn,
	                    author:author,
	                    publisher:publisher,
	                    year_published:year_published,
	                    category:category
	                },
	                beforeSend: function(){
	                   $('.btn-save-textbook').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
	                },
	                success: function(data){
	                    setTimeout(function(){
		                	$('#addModal').modal('hide');
		                    Swal.fire('Success', 'Textbook Added', 'success');
		                    getAllData();
		                    $('.btn-save-textbook').html('Save');
	                	}, 2000);

	                }
	            });
		}else{
			 Swal.fire('Error', 'Empty Fields', 'error');
		}



	});


	$(document).on('click', '.btn-edit', function(){
		var id = $(this).data('id');
		var title = $(this).data('title');
		var isbn = $(this).data('isbn');
		var author = $(this).data('author');
		var publisher = $(this).data('publisher');
		var year = $(this).data('year');
		var category = $(this).data('category');


		$('#textbook_id_edit').val(id);
		$('#title_edit').val(title);
		$('#isbn_edit').val(isbn);
		$('#author_edit').val(author);
		$('#publisher_edit').val(publisher);
		$('#year_published_edit').val(year);
		$('#category_edit').val(category);

		$('#editModal').modal('show');

	});

	$(document).on('click', '.btn-update-textbook', function(){
		var id = $('#textbook_id_edit').val();
		var title = $('#title_edit').val();
		var author = $('#author_edit').val();
		var publisher = $('#publisher_edit').val();
		var year_published = $('#year_published_edit').val();
		var category = $('#category_edit').val();
		var isbn = $('#isbn_edit').val();

			$.ajax({
                url: 'route/route.php',
                type: 'POST',
                data:{
                    action: 'updateTextbook',
                    id:id,
                    title:title,
                    isbn:isbn,
                    author:author,
                    publisher:publisher,
                    year_published:year_published,
                    category:category
                },
                beforeSend: function(){
                   $('.btn-update-textbook').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data){
                    setTimeout(function(){
	                	$('#editModal').modal('hide');
	                    Swal.fire('Success', 'Textbook Updated', 'success');
	                    getAllData();
	                    $('.btn-update-textbook').html('Update');
                	}, 2000);
                }
            });
	});

	$(document).on('click', '.btn-delete', function(){
		var id = $(this).data('id');
		$('#textbook_id').val(id);
		$('#deleteModal').modal('show');
	});

	$(document).on('click', '.btn-delete-textbook', function(){
		var id = $('#textbook_id').val();

			$.ajax({
                url: 'route/route.php',
                type: 'POST',
                data:{
                    action: 'deleteTextbook',
                    id:id,
                },
                beforeSend: function(){
                    $('.btn-delete-textbook').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data){
                	setTimeout(function(){
	                	$('#deleteModal').modal('hide');
	                    Swal.fire('Success', 'Textbook Deleted', 'success');
	                    getAllData();
	                    $('.btn-delete-textbook').html('Yes');
                	}, 2000);
                }
            });
	});


});