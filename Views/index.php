<?php 
	include_once("layouts/header.php");
	include_once("../Controllers/list_book.php");
	include_once("../Controllers/delete.php");
?>
			<div id="mainContent" class="clearfix">
				<div id="head">
					<h2>Manage Book</h2>
					<div id="add_more">
						<a href="add_new.php" class="btn btn-success">+ Add New</a>
					</div><!-----------------End add_more------------------>
				</div><!-----------------End head------------------>
				<div id="mainBody">
					<?php 
						if(isset($error)){ 
							echo '<div class="alert alert-error"> ' .$error. '</div>'; 
						}
						
						if(isset($success)){ 
							echo '<div class="alert alert-success"> ' .$success. '</div>';
						}
					?>
					<table class="table table-striped">
						<thead>
							<tr>
								<td> Title </td>
								<td> Snippet </td>
								<td> Upload Date </td>
								<td> Time Left </td>
								<td> Progress </td>
								<td> Action </td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
									if($list_book !== 0){
										foreach($list_book as $key => $value){

											$now = strtotime(date("now"));
											$date = strtotime($value["created_on"]);
											$r = $now - $date;
											if($r > 1){
												$m = "1 day left";
											}else{
												$m = "Expired";
											}

								?>
								<td><?php echo $value["title"]; ?></td>
								<td><?php echo $value["description"]; ?></td>
								<td><?php echo $value["time"]; ?></td>
								<td><?php echo $m; ?></td>
								<td> 
									<a href="edit.php?id=<?php echo $value['id']; ?>" title="<?php echo $value['title']?>">edit</a> | 
									<a href="index.php?delete=<?php echo $value['id']; ?>" title="<?php echo $value['title']?>">delete</a>
								</td>
							</tr>
								<?php
										}
									}
									else{
										echo '<td></td><td></td><td></td><td>No more Books under this section</td><td></td><td></td>';
									}
								?>
						</tbody>
					</table>
				</div><!-----------------End mainBody------------------>
			</div><!-----------------End mainContent------------------>
		</div><!-----------------End td_container------------------>
	</div><!-----------------End mainWrapper------------------>
</body>
</html>