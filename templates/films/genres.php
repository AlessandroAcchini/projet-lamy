<?php
$title = 'Détails du Film';
ob_start();
?>

<?php foreach($genres as $genre): ?>
	<?= htmlspecialchars($genre['nom']) ?> : <?= htmlspecialchars($genre['description']) ?><br><br>
<?php endforeach; ?>



<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>