<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_ENV['APP_NAME'] ?? 'MVC PHP' ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body>

<?php require BASE_PATH . '/app/Views/partials/navbar.php'; ?>

<main class="container">
    <?php \Core\View::yield('content'); ?>
</main>

<?php require BASE_PATH . '/app/Views/partials/footer.php'; ?>

<?php require __DIR__ . '/../partials/toast.php'; ?>
</body>
</html>
