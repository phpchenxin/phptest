<?php echo $username; ?>
<br />
<?= $username ?>
<hr />

<?php
	foreach ($hobby as $k=>$v) {
		echo $k . '__' . $v . '<br />';
	}
?>
<hr />

<?php foreach ($hobby as $k=>$v): ?>
<?= $k ?>___<?= $v ?><br />
<?php endforeach ?>
