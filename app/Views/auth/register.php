<?php \Core\View::startSection('content'); ?>

<h2>Registro</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <blockquote>
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </blockquote>
<?php endif; ?>

<form method="POST" action="/register">
    <input type="hidden" name="_csrf" value="<?= \Core\Csrf::token() ?>">
    <label>Nombre</label>
    <input type="text" name="name" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button class="button-primary">Crear cuenta</button>
</form>

<?php \Core\View::endSection(); ?>
