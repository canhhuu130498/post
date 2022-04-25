<?php include "includes/header.php" ?>
<?php require_once("includes/connection.php"); ?>
<?php
	if (isset($_POST["btn_submit"])) {
		$title = $_POST["title"];
		$content = $_POST["content"];
		$author = $_POST["author"];
		if ($title == "" || $content == "" || $author == "") {
			echo "Bạn vui lòng nhập đầy đủ thông tin";
		}else{
			$sql = "INSERT INTO posts(title, content, author, createdate, updatedate ) VALUES ( '$title', '$content', '$author', now(), now())";
			mysqli_query($conn,$sql);
			echo "Chúc mừng bạn đã nhập thành công";
		}
	}

?>
	<form action="them-post.php" method="post">
		<table>
			<tr>
				<td colspan="2"><h1>Thêm Post mới</h1></td>
			</tr>	
			<tr>
				<td>Title :</td>
				<td><input type="text" id="title" name="title"></td>
			</tr>
			<tr>
				<td>Content :</td>
				<td><textarea name="content" id="content" rows="20" cols="100"></textarea></td>
			</tr>
			<tr>
				<td>Author :</td>
				<td><input type="text" id="author" name="author"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Thêm Post"></td>
			</tr>

		</table>	
	</form>
</div>
</main>
<?php include "includes/footer.php" ?>