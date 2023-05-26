<h2>Les missions de l'agent <?= $params['agent']->getLastname() . " " . $params['agent']->getFirstname() ?></h2>

<?php
foreach ($params['agent']->getMissions() as $mission): ?>
    <div class="card mb-3">
        <div class="card-body">
            <a href="/managerKGB/mission/<?= $mission->getId() ?>"><?= $mission->title ?></a>
        </div>
    </div>
<?php endforeach; ?>
