<?php \Core\View::startSection('content'); ?>
<div x-data="{count: 0}">
    <h1>Welcome</h1>

    <p>
        Demo de un framework MVC en PHP,
        simple y minimalista.
    </p>

    <a class="button button-outline" href="http://localhost:8000/users/show?id=1">
        Ver usuario de ejemplo
    </a>

    <hr>

    <button @click="count++">
        Clicks: <span x-text="count"></span>
    </button>
</div>
<?php \Core\View::endSection(); ?>
