<div class="card m-5">
    <div class="card-body">
        <h2 class="text-primary"><?= $params['contact']->getLastname() . " " . $params['contact']->getFirstname() ?></h2>

        <p>de nationalité :
            <?php foreach ($params['contact']->getCountries() as $country): ?>
                <span><a class="text-info link-underline link-underline-opacity-0"
                         href="/managerKGB/country/<?= $country->getId() ?>"> <?= $country->nationalities ?></a></span>
            <?php endforeach; ?>
        </p>
        <p>Né le :
            <span><?= $params['contact']->getDateofBirth() ?></span>
        </p>
        <p>Nom de code :
            <span><?= $params['contact']->getNamecode() ?></span>
        </p>

        <?php if ($params['contact']->getMissions() !== []): ?>
            <p>Mission(s) :
                <?php foreach ($params['contact']->getMissions() as $k => $mission): ?>
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

        <a href="/managerKGB/contacts" class="btn btn-dark">Voir liste des contacts</a>

    </div>
</div>
