<div class="card m-5">
    <div class="card-body">
        <h2 class="text-primary"><?= $params['target']->getLastname() . " " . $params['target']->getFirstname() ?></h2>

        <p>de nationalité :
            <?php foreach ($params['target']->getCountries() as $country): ?>
                <span><a class="text-info link-underline link-underline-opacity-0"
                         href="/managerKGB/country/<?= $country->getId() ?>"> <?= $country->nationalities ?></a></span>
            <?php endforeach; ?>
        </p>
        <p>Né le :
            <span><?= $params['target']->getDateofBirth() ?></span>
        </p>
        <p>Nom de code :
            <span><?= $params['target']->getNamecode() ?></span>
        </p>

        <?php if ($params['target']->getMissions() !== []): ?>
            <p>Mission(s) :
                <?php foreach ($params['target']->getMissions() as $k => $mission): ?>
                    <?php if ($k > 0): ?>
                        ,
                    <?php endif; ?>
                    <span><a class="text-black link-underline link-underline-opacity-0"
                             href="/managerKGB/mission/<?= $mission->getId() ?>"><?= $mission->title ?></a></span>
                <?php endforeach; ?>
            </p>
        <?php else: ?>
            <p>Aucune Mission</p>
        <?php endif; ?>

        <a href="/managerKGB/targets" class="btn btn-dark">Voir liste des cibles</a>

    </div>
</div>
