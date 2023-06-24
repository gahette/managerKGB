<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">Vous êtes connecté en tant que <?= $_SESSION['auth'][3] . ' ' . $_SESSION['auth'][2] ?> !</div>
<?php endif; ?>

<div class="col-md-6 mx-auto">

    <?php if (!isset($_SESSION['auth'])): ?>
        <h1>Bienvenue, <span></span></h1>
    <p>Veuillez-vous identifier pour visualiser et/ou administrer l'agence !</p>
        <a href="/managerKGB/login" class="btn btn-dark">Se connecter</a>
    <?php else: ?>
        <h1>Bienvenue, <span><?= $_SESSION['auth'][3] . ' ' . $_SESSION['auth'][2] ?></span></h1>
<?php if ($this->isAdmin()): ?>
        <p>Vous pouvez maintenant administrer les données!</p>
        <?php else: ?>
        <p>Vous pouvez maintenant visualiser les données</p>
<?php endif; ?>
        <a href="/managerKGB/logout" class="btn btn-dark mb-4"
           onclick="return confirm('Voulez-vous vraiment vous déconnecter ?')">Se Déconnecter</a>
    <?php endif; ?>
</div>
