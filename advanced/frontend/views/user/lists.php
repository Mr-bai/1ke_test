<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>
<table>
	<tr>
		<td>ID</td>
		<td>名字</td>
		<td>性别</td>
		<td>操作</td>
	</tr>
	<?php foreach ($arr as $k => $v): ?>
	<tr>
		<td><?php echo $v['id']?></td>
		<td><?php echo $v['name']?></td>
		<td><?php echo $v['sxe']?></td>
		<td>
			<a href="<?= Url::toRoute(['user/del','id'=>$v['id']])?>">删除</a>
			<a href="<?= Url::toRoute(['user/save','id'=>$v['id']])?>">修改</a>
		</td>
	</tr>
	<?php endforeach ?>
</table>