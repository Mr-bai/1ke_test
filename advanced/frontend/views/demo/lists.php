<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
?>
<table>
	<tr>
		<td>ID</td>
		<td>留言</td>
		<td>内容</td>
		<td>留言人</td>
		<td>操作</td>
	</tr>
	<?php foreach ($data as $k => $v): ?>
	<tr>
		<td><?php echo $v['u_id']?></td>
		<td><?php echo $v['massage']?></td>
		<td><?php echo $v['content']?></td>
		<td><?php echo $v['name']?></td>
		<td>
			<a href="<?= Url::toRoute(['demo/del','u_id'=>$v['u_id']])?>">删除</a>
			<a href="<?= Url::toRoute(['demo/save','u_id'=>$v['u_id']])?>">修改</a>
		</td>
	</tr>
	<?php endforeach ?>
	<tr>
		<td><?= LinkPager::widget(['pagination' => $pagination]) ?></td>
	</tr>
	
</table>

