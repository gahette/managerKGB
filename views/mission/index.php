<h2>Les Missions</h2>

<?php
foreach ($params['missions'] as $mission): ?>
    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $mission->getTitle() ?></h2>
            <div>
                <?php foreach ($mission->getCountries() as $country): ?>
                    <span class="badge bg-info"><a href="/managerKGB/country/<?= $country->getId() ?>"
                                                   class="text-white link-underline link-underline-opacity-0"><?= $country->name ?></a></span>
                <?php endforeach; ?>
                <?php foreach ($mission->getAgents() as $agent): ?>
                    <span class="badge bg-primary"><a href="/managerKGB/agent/<?= $agent->getId() ?>"
                                                   class="text-white link-underline link-underline-opacity-0"><?= $agent->lastname ?></a></span>
                <?php endforeach; ?>
            </div>
            <small class="text-info">Créée le <?= $mission->getCreatedAt() ?></small>
            <small class="text-primary">Modifiée le<?= $mission->getClosedAt() ?></small>
            <p><?= $mission->getExcerpt() ?></p>
            <a href="/managerKGB/mission/<?= $mission->getId() ?>" class="btn btn-primary">Lire plus</a>
        </div>
    </div>
<?php endforeach; ?>