<?php \Core\View::startSection('content'); ?>

<h3>Usuario</h3>

<p><strong>ID:</strong> <?= htmlspecialchars($user->id) ?></p>
<p><strong>Nombre:</strong> <?= htmlspecialchars($user->name ?? '') ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($user->email ?? '') ?></p>

<?php \Core\View::endSection(); ?>
