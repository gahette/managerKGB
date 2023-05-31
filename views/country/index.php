<h2 class="m-3">Les Pays</h2>

<div class="row">
    <?php foreach ($params['countries'] as $country): ?>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="text-info"><?= $country->getName() ?></h2>
                    <div>
                        <?php foreach ($country->getMissions() as $mission): ?>
                            <p class="badge bg-dark-subtle"><a href="/managerKGB/mission/<?= $mission->getId() ?>"
                                                               class="text-white link-underline link-underline-opacity-0"><?= $mission->name_code ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($country->getAgents() as $agent): ?>
                            <p class="badge bg-primary"><a href="/managerKGB/agent/<?= $agent->getId() ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= $agent->id_code ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($country->getContacts() as $contact): ?>
                            <p class="badge bg-primary"><a href="/managerKGB/contact/<?= $contact->getId() ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= $contact->name_code ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($country->getTargets() as $target): ?>
                            <p class="badge bg-primary"><a href="/managerKGB/target/<?= $target->getId() ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= $target->name_code ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($country->getHideouts() as $hideout): ?>
                            <p class="badge bg-primary"><a href="/managerKGB/hideout/<?= $hideout->getId() ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= $hideout->code ?></a>
                            </p>
                        <?php endforeach; ?>
                    </div>
                    <a href="/managerKGB/country/<?= $country->getId() ?>" class="btn btn-dark">Voir plus sur ce pays</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
