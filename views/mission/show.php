<h1><?= $params['mission']->getTitle() ?></h1>
<div>
    <?php foreach ($params['mission']->getCountries() as $country): ?>
        <span class="badge bg-info"><?= $country->name ?></span>
    <?php endforeach; ?>
</div>
<p><?= $params['mission']->getContent() ?></p>
<a href="/managerKGB/missions" class="btn btn-secondary">Retourner en arrière</a>

