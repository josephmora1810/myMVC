<?php \Core\View::startSection('content'); ?>

<h2>Login</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <blockquote>
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </blockquote>
<?php endif; ?>

<form method="POST" action="/login">
    <input type="hidden" name="_csrf" value="<?= \Core\Csrf::token() ?>">
    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button class="button-primary">Entrar</button>
</form>

<?php \Core\View::endSection(); ?>
