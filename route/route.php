<?php
session_start();
include '../class/database.php';

$db = new Database;


if(isset($_POST['action'])){

     switch ($_POST['action']){

     	case 'saveTextbook':
     		
     		$title = $_POST['title'];
     		$isbn = $_POST['isbn'];
     		$author = $_POST['author'];
     		$publisher = $_POST['publisher'];
     		$year_published = $_POST['year_published'];
     		$category = $_POST['category'];
     		$date_added = date('Y-m-d H:i:s');

     		$db->title = $title;
     		$db->isbn = $isbn;
     		$db->author = $author;
     		$db->publisher = $publisher;
     		$db->year_published = $year_published;
     		$db->category = $category;
     		$db->date_added = $date_added;
     		$result = $db->saveData();

     		if($result){
     			echo "success";
     		}else{	
     			echo "failed";
     		}

     	break;




     	case 'getAllTextbook':
     		$list = $db->getAllData();

     			if($list == true){
	     			foreach ($list as $l) {
	                   ?>
	                    <tr>
	                        <td><?= $l->title ?></td>
	                        <td><?= $l->isbn ?></td>
	                        <td><?= $l->author ?></td>
	                        <td><?= $l->publisher ?></td>
	                        <td><?= $l->year_published ?></td>
	                        <td><?= $l->category?></td>                        
	                        <td>
	                            <button class="btn btn-info btn-edit" data-id="<?=$l->id?>" data-title="<?=$l->title?>" data-isbn="<?=$l->isbn?>" data-author="<?=$l->author?>" data-publisher="<?=$l->publisher?>" data-year="<?=$l->year_published?>" data-category="<?=$l->category?>"><i class="fa-solid fa-pen-to-square"></i></button>
	                            <button class="btn btn-danger btn-delete" data-id="<?=$l->id?>"><i class="fa-solid fa-trash"></i></button>
	                        </td>
	                    </tr>

	                   <?php
	                }
     			}else{
     				echo " <div class='data-unavailable'> No Data Available. </div>";
     			}

 
     	break;

     	case 'deleteTextbook':
     		$id = $_POST['id'];
     		$result = $db->deleteData($id);
     	break;

     	case 'updateTextbook':
     		$id = $_POST['id'];
     		$title = $_POST['title'];
     		$isbn = $_POST['isbn'];
     		$author = $_POST['author'];
     		$publisher = $_POST['publisher'];
     		$year_published = $_POST['year_published'];
     		$category = $_POST['category'];

     		$db->title = $title;
     		$db->isbn = $isbn;
     		$db->author = $author;
     		$db->publisher = $publisher;
     		$db->year_published = $year_published;
     		$db->category = $category;
     		$result = $db->updateData($id);


     	break;

     }
 }
?>