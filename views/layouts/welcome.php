<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">Vous êtes connecté!</div>
<?php endif; ?>

<div class="col-md-6 mx-auto">


    <h1>Bienvenue, <span></span></h1>

    <?php if (!isset($_SESSION['auth'])): ?>
    <p>Veuillez-vous identifier pour visualiser et administrer l'agence !</p>
        <a href="/managerKGB/login" class="btn btn-dark">Se connecter</a>
    <?php else: ?>
        <p>Gestion de l'agence!</p>
        <a href="/managerKGB/logout" class="btn btn-dark mb-4"
           onclick="return confirm('Voulez-vous vraiment vous déconnecter ?')">Se Déconnecter</a>
    <?php endif; ?>
</div>
