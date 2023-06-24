<div class="card m-5">
    <div class="card-body">
        <h2 class="text-primary"><?= $_SESSION['auth'][2] . ' ' . $_SESSION['auth'][3] ?></h2>

        <p>Pseudo :
            <?= $_SESSION['auth'][1] ?>
        </p>
        <p>Email :
            <?= $_SESSION['auth'][4] ?>
        </p>
        <p>Créé le :
            <?= $_SESSION['auth'][5] ?>
        </p>
    </div>