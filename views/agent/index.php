 <h2 class="m-3">Les Agents</h2>

        <div class="row">
            <?php foreach ($params['agents'] as $agent): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2><?= e($agent->getLastname()) ?></h2>
                            <h3><?= e($agent->getFirstname()) ?></h3>
                            <div>
                                <?php foreach ($agent->getMissions() as $mission): ?>
                                    <p class="badge bg-dark-subtle"><a
                                                href="/managerKGB/mission/<?= e($mission->getId()) ?>"
                                                class="text-white link-underline link-underline-opacity-0"><?= e($mission->name_code) ?></a>
                                    </p>
                                <?php endforeach; ?>
                                <?php foreach ($agent->getCountries() as $country): ?>
                                    <p class="badge bg-primary"><a href="/managerKGB/country/<?= e($country->getId()) ?>"
                                                                   class="text-white link-underline link-underline-opacity-0"><?= e($country->name) ?></a>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                            <a href="/managerKGB/agent/<?= e($agent->getId()) ?>" class="btn btn-dark">Lire plus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>