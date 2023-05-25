<?php
foreach ($params['missions'] as $mission): ?>
<div class="card mb-3">
    <div class="card-body">
        <h2><?= $mission->title ?></h2>
        <small><?= $mission->created_at ?></small>
        <p><?= $mission->content ?></p>
        <a href="/managerKGB/mission/<?= $mission->id ?>" class="btn btn-primary">Lire plus</a>
    </div>
</div>
<?php endforeach; ?>