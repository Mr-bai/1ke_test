<meta charset="utf8">
<form action="index.php?r=demo/upd" method="post">
	<table>
		<tr>
			<td>名字</td>
			<td><input type="text" name="massage" value="<?php echo $arr['massage']?>"></td>
		</tr>
		<tr>
			<td>性别</td>
			<td><input type="text" name="content" value="<?php echo $arr['content']?>"></td>
		</tr>
		<tr>
			<td><input type="submit" value="提交"></td>
			<td><input type="hidden" name="u_id" value="<?php echo $arr['u_id']?>"></td>
		</tr>
	</table>
</form>
