<?php if (isset($_SESSION['errors'])): ?>

<?php foreach ($_SESSION['errors'] as $errorsArray): ?>
    <?php foreach ($errorsArray as $errors): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>
<?php endif; ?>
<?php session_destroy(); ?>


<div class="col-md-6 mx-auto">
    <h2>Se connecter</h2>

    <form
            action="/managerKGB/login" method="POST">
        <div class="form-group">
            <label for="username"><strong>Nom d'utilisateur</strong></label>
            <input type="text" class="form-control mb-3" name="username" id="username" placeholder="Utilisateur">
        </div>
        <div class="form-group">
            <label for="password"><strong>Mot de passe</strong></label>
            <input type="password" class="form-control mb-3" id="password" name="password"
        </div>

        <button type="submit"
                class="btn btn-primary mb-3">Se connecter
        </button>
    </form>
</div>