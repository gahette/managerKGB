<?php

use App\Models\Country;

$pages = (new Country($this->db))->getPages();
$pagination = (new Country($this->db));
$link = "countries";
?>


<h2 class="m-3">Les Pays</h2>

<div class="row">
    <?php foreach ($params['countries'] as $country): ?>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="text-info"><?= e($country->getName()) ?></h2>
                    <div>
                        <?php foreach ($country->getMissions() as $mission): ?>
                            <p class="badge bg-dark-subtle"><a href="/managerKGB/mission/<?= e($mission->getId()) ?>"
                                                               class="text-white link-underline link-underline-opacity-0"><?= e($mission->name_code) ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($country->getAgents() as $agent): ?>
                            <p class="badge bg-primary"><a href="/managerKGB/agent/<?= e($agent->getId()) ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= e($agent->id_code) ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($country->getContacts() as $contact): ?>
                            <p class="badge bg-primary"><a href="/managerKGB/contact/<?= e($contact->getId()) ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= e($contact->name_code) ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($country->getTargets() as $target): ?>
                            <p class="badge bg-primary"><a href="/managerKGB/target/<?= e($target->getId()) ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= e($target->name_code) ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($country->getHideouts() as $hideout): ?>
                            <p class="badge bg-primary"><a href="/managerKGB/hideout/<?= e($hideout->getId()) ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= e($hideout->code) ?></a>
                            </p>
                        <?php endforeach; ?>
                    </div>
                    <a href="/managerKGB/country/<?= e($country->getId()) ?>" class="btn btn-dark">Voir plus sur ce pays</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="pagination justify-content-center mb-3"><?= $pagination->paginateInfo(); ?></div>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="?page=1">&laquo;&laquo;&laquo;</a>
        </li>
        <li class="page-item">
            <?= $pagination->paginatedPrevious($link); ?>
        </li>
        <li class="page-item d-flex">
            <?= $pagination->paginatedNumber($link); ?>
        </li>
        <li class="page-item">
            <?= $pagination->paginatedNext($link); ?>
        </li>
        <li class="page-item">
            <a class="page-link" href="?page=<?= $pages ?>">&raquo;&raquo;&raquo;</a>
        </li>
    </ul>
</nav>