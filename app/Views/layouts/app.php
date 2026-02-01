<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_ENV['APP_NAME'] ?? 'MVC PHP' ?></title>

    <!-- MiligramCSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css">

    <!-- AlpineJs -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.6/dist/cdn.min.js"></script></head>
<body>
    <?php require __DIR__ . '/../partials/navbar.php'; ?>

    <main class="container">
        <?php \Core\View::yield('content'); ?>
    </main>
</body>
</html>