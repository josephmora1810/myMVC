<?php if (!empty($_SESSION['toast'])): ?>
<div
    x-data="{ show: true }"
    x-show="show"
    x-init="setTimeout(() => show = false, 3000)"
    style="
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #323232;
        color: white;
        padding: 1rem;
        border-radius: 5px;
    "
>
    <?= $_SESSION['toast']; unset($_SESSION['toast']); ?>
</div>
<?php endif; ?>
