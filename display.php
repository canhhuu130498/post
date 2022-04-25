<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>
<?php
	$id = -1;
	if (isset($_GET["id"])) {
		$id = intval($_GET['id']);
	}
	$sql = "select * from posts where id = $id";
	$query = mysqli_query($conn,$sql);
?>
			<div class="content">
			<?php 
				while ( $data = mysqli_fetch_array($query) ) {
			?>
				<h3><?php echo $data['title']; ?></h3>
				<p><?php echo $data['content']; ?></p>
				<p class="date"><i> Ngày tạo : <?php echo $data['createdate']; ?></i><?php echo $data['author']; ?></p>
			<?php } ?>
			</div>
		</main>
<?php
	$sql = "select * from posts order by createdate desc limit 15";
	$query = mysqli_query($conn,$sql);
?>
			<div class="container main">
				<table class="main_content">
					<tr>
					<?php
						$i = 0;
						while ( $data = mysqli_fetch_array($query) ) {
							if ($i == 1) {
								echo "</tr>";
								$i = 0;
							}
					?>
						<td>
							<h3><?php echo $data["title"]; ?></h3>
							<p><?php echo substr($data["content"], 0, 300)." ...";?></p>
							<p class="see_more"><a href="display.php?id=<?php echo $data["id"];?>"> Xem thêm</a></p>
							<p class="date">
								<i>
									<?php echo $data["createdate"];?>		
								</i>
								<?php echo $data["author"];?>
							</p>
						</td>
					
					<?php
							$i++;
						}
					?>
				</table>
			</div>
<?php include "includes/footer.php" ?>