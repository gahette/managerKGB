<h2>Les Pays</h2>

<?php
foreach ($params['countries'] as $country): ?>
    <div class="card mb-3">
        <div class="card-body">
            <h2><a class="text-info link-underline link-underline-opacity-0" href="/managerKGB/countries/<?= $country->getId() ?>"> <?= $country->getName() ?></a></h2>
            <div>
                <?php foreach ($country->getMissions() as $mission): ?>
                    <span class="badge bg-dark-subtle"><a href="/managerKGB/mission/<?= $mission->getId() ?>"
                                                   class="text-white link-underline link-underline-opacity-0"><?= $mission->name_code ?></a></span>
                <?php endforeach; ?>
                <?php foreach ($country->getAgents() as $agent): ?>
                    <span class="badge bg-primary"><a href="/managerKGB/agents/<?= $agent->getId() ?>"
                                                      class="text-white link-underline link-underline-opacity-0"><?= $agent->lastname ?></a></span>
                <?php endforeach; ?>
            </div>
            <a href="/managerKGB/countries/<?= $country->getId() ?>" class="btn btn-primary">Lire plus</a>
        </div>
    </div>
<?php endforeach; ?>