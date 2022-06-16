<?php 
	include_once("layouts/header.php");
	include_once("../Controllers/create_book.php");
?>
 
<div id="mainContent">
	<div id="head">
		<h2>Create Book</h2>
	</div>
	<form action="add_new.php" method="post">
		<div id="mainBody">
			<?php 
					if(isset($error)){ 
						echo '<div class="alert alert-error"> ' .$error. '</div>'; 
					}
					
					if(isset($success)){ 
						echo '<div class="alert alert-success"> ' .$success. '</div>';
					}
			?>
			<div class="form_field">
				<label for="Title">Title</label>
				<input type="text" name="title" id="title">
			</div>
			<div class="form_field">
				<label for="Description">Description</label>
				<textarea name="desc" id="desc"></textarea>
			</div>
			<div class="form_field">
				<label for="Hours to Read">Hours to Read</label>
				<input type="text" name="up_date" id="time">
			</div>
			<div class="form_field">
				<label for="Lable Under">Lable Under</label>
				<select name="label_under" id="label_under">
					<option value="">Select</option>
					<option value="Novel">Novel</option>
					<option value="Short story">Short story</option>
					<option value="Periodicals">Periodicals</option>
				</select>
			</div>
			<div class="form_field">
				<input type="submit" name="register_book" value="register_book" class="btn btn-info" id="register_book">
			</div>
		</div>
	</form>
</div>