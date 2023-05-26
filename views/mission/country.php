<h2>Les missions <a class="link-underline link-underline-opacity-0" href="/managerKGB/countries/<?= $params['country']->getId() ?>"> <?= $params['country']->getNationalities() ?></a></h2>

<?php
foreach ($params['country']->getMissions() as $mission): ?>
    <div class="card mb-3">
        <div class="card-body">
            <a href="/managerKGB/mission/<?= $mission->getId() ?>"><?= $mission->title ?></a>
        </div>
    </div>
<?php endforeach; ?>
