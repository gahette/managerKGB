<div class="card m-5">
    <div class="card-body">
        <h2><?= e($params['hideout']->getCode()) ?></h2>

        <p>de nationalité :
            <?php foreach ($params['hideout']->getCountries() as $country): ?>
                <span><a class="text-info link-underline link-underline-opacity-0"
                         href="/managerKGB/country/<?= e($country->getId()) ?>"> <?= e($country->nationalities) ?></a></span>
            <?php endforeach; ?>
            <?php if ($params['hideout']->getTypes() !== []): ?>
        <p>Planque(s) :
            <?php foreach ($params['hideout']->getTypes() as $k => $type): ?>
                <?php if ($k > 0): ?>
                    ,
                <?php endif; ?>
                <span><?= e($type->name) ?></span>
            <?php endforeach; ?>
        </p>
        <?php else: ?>
            <p>Aucune Mission</p>
        <?php endif; ?>
        <?php if ($params['hideout']->getMissions() !== []): ?>
            <p>Mission(s) :
                <?php foreach ($params['hideout']->getMissions() as $k => $mission): ?>
                    <?php if ($k > 0): ?>
                        ,
                    <?php endif; ?>
                    <span><a class="text-black link-underline link-underline-opacity-0"
                             href="/managerKGB/mission/<?= e($mission->getId()) ?>"><?= e($mission->title) ?></a></span>
                <?php endforeach; ?>
            </p>
        <?php else: ?>
            <p>Aucune Mission</p>
        <?php endif; ?>

        <a href="/managerKGB/hideouts" class="btn btn-dark">Voir liste des planques</a>

    </div>
</div>
