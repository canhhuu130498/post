<?php include "includes/header.php" ?>
<?php require_once("includes/connection.php"); ?>
<?php
	$sql = "select * from posts order by createdate desc limit 15";
	$query = mysqli_query($conn,$sql);
?>
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
							<h3><?php echo $data["title"];// In ra title bài viết ?></h3>
							<p><?php echo substr($data["content"], 0, 300)." ...";?></p>
							<p class="see_more"><a href="display.php?id=<?php echo $data["id"];?>"> Xem thêm</a></p>
							<p class="date">
								<i>
									<?php echo $data["createdate"]; ?>
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
		</main>
<?php include "includes/footer.php" ?>