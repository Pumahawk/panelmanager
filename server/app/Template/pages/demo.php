<?php $project = $data['project'] ?>
<h1>Demo Frontend PanelManager</h1>
<hr>
<h2>Project info</h2>
<hr>
<p>
<table width="100%">
	<thead>
		<tr>
			<td>ID</td><td>Nome</td><td>Descrizione</td><td>Extra</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($project as $progetto): ?>
		<tr>
			<td><?=$progetto['info'] -> id?></td><td><?=$progetto['info'] -> nome?></td><td><?=$progetto['info'] -> descrizione?></td><td><?=json_encode($progetto['info'] -> extra) ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</p>
<hr>
<h2>Media Project</h2>
<hr>
<?php foreach ($project as $progetto): ?>
<strong><?= $progetto['info'] -> id ?>:<?= $progetto['info'] -> nome ?></strong>
<table width="100%">
	<thead>
		<tr>
			<td>ID</td><td>Media</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($progetto['media'] as $media): ?>
		<tr>
			<td><?= $media['id']?></td><td><a href="app/data/media/<?= $media['nome'] ?>"><?= $media['nome'] ?></a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<hr>
<?php endforeach; ?>
