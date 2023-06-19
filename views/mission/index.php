<?php

use App\Models\Mission;

$pages = (new Mission($this->db))->getPages();
$pagination = (new Mission($this->db));
$link = "missions";
?>


<h2>Les Missions</h2>

<div class="row">
    <?php foreach ($params['missions'] as $mission): ?>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h2><?= e($mission->getTitle()) ?>
                    </h2>
                    <p> Status : <?php foreach ($mission->getStatus() as $status): ?>
                            <span class="text-muted"><?= e($status->name) ?>
                            </span><?php endforeach; ?>
                    </p>
                    <p>
                        Type de mission :
                        <?php foreach ($mission->getTypesMissions() as $typesMission): ?>
                            <span><?= e($typesMission->name) ?></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        Nom de code :
                        <?= e($mission->getNamecode()) ?>
                    </p>
                    <p>
                        Spécialité(s) :
                        <?php foreach ($mission->getSpecialities() as $speciality): ?>
                            <span><?= e($speciality->name) ?></span>
                        <?php endforeach; ?>
                    </p>

                    <p>Théâtre de la mission :
                        <?php foreach ($mission->getCountries() as $country): ?>
                            <span class="badge bg-info"><a href="/managerKGB/country/<?= e($country->getId()) ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= e($country->iso3166) ?></a></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        Agent(s) affecté(s) :
                        <?php foreach ($mission->getAgents() as $agent): ?>
                            <span class="badge bg-primary"><a href="/managerKGB/agent/<?= e($agent->getId()) ?>"
                                                              class="text-white link-underline link-underline-opacity-0"><?= e($agent->id_code) ?></a></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        Contact(s) de la mission :
                        <?php foreach ($mission->getContacts() as $contact): ?>
                            <span class="badge bg-secondary"><a href="/managerKGB/contact/<?= e($contact->getId()) ?>"
                                                                class="text-white link-underline link-underline-opacity-0"><?= e($contact->getNamecode()) ?></a></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        Cible(s) de la mission :
                        <?php foreach ($mission->getTargets() as $target): ?>
                            <span class="badge bg-danger"><a href="/managerKGB/target/<?= e($target->getId()) ?>"
                                                             class="text-white link-underline link-underline-opacity-0"><?= e($target->getNamecode()) ?></a></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        Planque(s) utilisée(s) pour la mission :
                        <?php foreach ($mission->getHideouts() as $hideout): ?>
                            <span class="badge bg-warning"><a href="/managerKGB/hideout/<?= e($hideout->getId()) ?>"
                                                              class="text-white link-underline link-underline-opacity-0"><?= e($hideout->code) ?></a></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        <small class="text-info">Créée le <?= e($mission->getCreatedAt()) ?></small>
                    </p>
                    <p>
                        <small class="text-primary">Modifiée le <?= e($mission->getClosedAt()) ?></small>
                    </p>

                    <p>Extrait Description : <br>
                        <span><?= e($mission->getExcerpt()) ?></span>
                    </p>

                    <a href="/managerKGB/mission/<?= e($mission->getId()) ?>" class="btn btn-dark mb-4">Voir plus sur cette
                        mission</a>
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


