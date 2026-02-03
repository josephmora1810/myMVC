<nav class="navigation">
    <div class="container">
        <a href="/" class="navigation-title">
            <strong><?= $_ENV['APP_NAME'] ?? 'MVC PHP' ?></strong>
        </a>

        <ul class="navigation-list float-right">
            <?php if (!empty($_SESSION['user'])): ?>
                <li class="navigation-item">
                    <span>Hola, <?= htmlspecialchars($_SESSION['user']['name']) ?></span>
                </li>

                <li class="avigation-list float-right">
                    <form method="POST" action="/logout" style="display:inline">
                        <input type="hidden" name="_csrf" value="<?= \Core\Csrf::token() ?>">
                        <button type="submit" class="">Cerrar sesión</button>
                    </form>
                </li>
            <?php else: ?>
                <li class="navigation-item">
                    <a href="/login">Login</a>
                </li>
                <li class="navigation-item">
                    <a href="/register">Registro</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<hr>
