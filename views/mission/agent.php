<div class="card m-5">
    <div class="card-body">
        <h2 class="text-primary"><?= $params['agent']->getLastname() . " " . $params['agent']->getFirstname() ?></h2>

        <p>de nationalité :
            <?php foreach ($params['agent']->getCountries() as $country): ?>
                <span><a class="text-info link-underline link-underline-opacity-0"
                         href="/managerKGB/country/<?= $country->getId() ?>"> <?= $country->nationalities ?></a></span>
            <?php endforeach; ?>
        </p>
        <p>Né le :
            <span><?= $params['agent']->getDateofBirth() ?></span>
        </p>
        <p>Code d'identification :
            <span><?= $params['agent']->getIdcode() ?></span>
        </p>

        <?php if ($params['agent']->getSpecialities() !== []): ?>
            <p>Spécialité(s) :
                <?php foreach ($params['agent']->getSpecialities() as $k => $speciality): ?>
                    <?php if ($k > 0): ?>
                        ,
                    <?php endif; ?>
                    <span><a class="text-black link-underline link-underline-opacity-0"
                             href="/managerKGB/speciality/<?= $speciality->getId() ?>"><?= $speciality->name ?></a></span>
                <?php endforeach; ?>
            </p>
        <?php else: ?>
            <p>Aucune Spécialité</p>
        <?php endif; ?>

        <?php if ($params['agent']->getMissions() !== []): ?>
            <p>Affectation mission(s) :
                <?php foreach ($params['agent']->getMissions() as $k => $mission): ?>
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

        <a href="/managerKGB/agents" class="btn btn-dark">Voir liste des agents</a>

    </div>
</div>