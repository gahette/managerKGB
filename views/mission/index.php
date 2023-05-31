<h2>Les Missions</h2>
<div class="row">
    <?php foreach ($params['missions'] as $mission): ?>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h2><?= $mission->getTitle() ?>
                    </h2>
                    <p> Status : <?php foreach ($mission->getStatus() as $status): ?>
                            <span class="text-muted"><?= $status->name ?>
                            </span><?php endforeach; ?>
                    </p>
                    <p>
                        Type de mission :
                        <?php foreach ($mission->getTypesMissions() as $typesMission): ?>
                            <span><?= $typesMission->name ?></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        Nom de code :
                        <?= $mission->getNamecode() ?>
                    </p>
                    <p>
                        Spécialité(s) :
                        <?php foreach ($mission->getSpecialities() as $speciality): ?>
                            <span><?= $speciality->name ?></span>
                        <?php endforeach; ?>
                    </p>

                    <p>Théâtre de la mission :
                        <?php foreach ($mission->getCountries() as $country): ?>
                            <span class="badge bg-info"><a href="/managerKGB/country/<?= $country->getId() ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= $country->iso3166 ?></a></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        Agent(s) affecté(s) :
                        <?php foreach ($mission->getAgents() as $agent): ?>
                            <span class="badge bg-primary"><a href="/managerKGB/agent/<?= $agent->getId() ?>"
                                                              class="text-white link-underline link-underline-opacity-0"><?= $agent->id_code ?></a></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        Contact(s) de la mission :
                        <?php foreach ($mission->getContacts() as $contact): ?>
                            <span class="badge bg-secondary"><a href="/managerKGB/contact/<?= $contact->getId() ?>"
                                                                class="text-white link-underline link-underline-opacity-0"><?= $contact->getNamecode() ?></a></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        Cible(s) de la mission :
                        <?php foreach ($mission->getTargets() as $target): ?>
                            <span class="badge bg-danger"><a href="/managerKGB/target/<?= $target->getId() ?>"
                                                             class="text-white link-underline link-underline-opacity-0"><?= $target->getNamecode() ?></a></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        Planque(s) utilisée(s) pour la mission :
                        <?php foreach ($mission->getHideouts() as $hideout): ?>
                            <span class="badge bg-warning"><a href="/managerKGB/hideout/<?= $hideout->getId() ?>"
                                                              class="text-white link-underline link-underline-opacity-0"><?= $hideout->code ?></a></span>
                        <?php endforeach; ?>
                    </p>
                    <p>
                        <small class="text-info">Créée le <?= $mission->getCreatedAt() ?></small>
                    </p>
                    <p>
                        <small class="text-primary">Modifiée le <?= $mission->getClosedAt() ?></small>
                    </p>

                    <p>Extrait Description : <br>
                        <span><?= $mission->getExcerpt() ?></span>
                    </p>

                    <a href="/managerKGB/mission/<?= $mission->getId() ?>" class="btn btn-dark mb-4">Voir plus sur cette
                        mission</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
