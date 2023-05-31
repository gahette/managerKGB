 <h2 class="m-3">Les Agents</h2>

        <div class="row">
            <?php foreach ($params['agents'] as $agent): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2><?= $agent->getLastname() ?></h2>
                            <h3><?= $agent->getFirstname() ?></h3>
                            <div>
                                <?php foreach ($agent->getMissions() as $mission): ?>
                                    <p class="badge bg-dark-subtle"><a
                                                href="/managerKGB/mission/<?= $mission->getId() ?>"
                                                class="text-white link-underline link-underline-opacity-0"><?= $mission->name_code ?></a>
                                    </p>
                                <?php endforeach; ?>
                                <?php foreach ($agent->getCountries() as $country): ?>
                                    <p class="badge bg-primary"><a href="/managerKGB/country/<?= $country->getId() ?>"
                                                                   class="text-white link-underline link-underline-opacity-0"><?= $country->name ?></a>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                            <a href="/managerKGB/agent/<?= $agent->getId() ?>" class="btn btn-dark">Lire plus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>