<meta charset="utf8">
<form action="index.php?r=user/upd" method="post">
	<table>
		<tr>
			<td>名字</td>
			<td><input type="text" name="name" value="<?php echo $arr['name']?>"></td>
		</tr>
		<tr>
			<td>性别</td>
			<td><input type="text" name="sxe" value="<?php echo $arr['sxe']?>"></td>
		</tr>
		<tr>
			<td><input type="submit" value="提交"></td>
			<td><input type="hidden" name="id" value="<?php echo $arr['id']?>"></td>
		</tr>
	</table>
</form>
