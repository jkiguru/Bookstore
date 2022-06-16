<?php 
	include_once("layouts/header.php");
	include_once("../Controllers/list_book.php");
	include_once("../Controllers/edit_book.php");
?>
<div id="mainContent"> 
	<div id="head">
		<h2>Edit Book</h2>
	</div>
	<form action="edit.php" method="post">
		<div id="mainBody">
			<?php 
				if(isset($error)){ 
					echo '<div class="alert alert-error"> ' .$error. '</div>'; 
				}
				
				if(isset($success)){ 
					echo '<div class="alert alert-success"> ' .$success. '</div>';
				}
			?>

			<?php
			foreach($list_book as $lb)
			{
				$given_array = array("Novel", "Short story", "Periodicals");
				$selected_array = array($lb["label"]);
				$array_remaining = array_diff($given_array,$selected_array);
			?>
			<div class="form_field">
				<label for="Title">Title</label>
				<input type="text" name="title" value="<?php echo $lb["title"];?>">
			</div>
			<div class="form_field">
				<label for="Description">Description<small>(Optional)</small></label>
				<textarea name="desc"><?php echo $lb["description"];?></textarea>
			</div>
			<div class="form_field">
				<label for="Due Date">Upload Date</label>
				<input type="text" name="up_date" value="<?php echo $lb["created_on"];?>">
			</div>
			<div class="form_field">
				<label for="Lable Under"></label>
				<select name="label_under" id="label_under">
					<?php echo '<option value="'.$lb['label'].'">'.$lb['label'].'</option>'; 
					foreach($array_remaining as $ar){
						echo '<option value="'.$ar.'">'.$ar.'</option>';
					}

					?>
				</select>
			</div>
			<div class="form_field">
				<input type="submit" name="create_book" value="Edit" class="btn btn-info" id="create_book">
			</div>
		<?php }?>
		</div>
	</form>
</div>