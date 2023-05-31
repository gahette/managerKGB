<h2 class="m-3">Les Cibles</h2>

<div class="row">
    <?php foreach ($params['targets'] as $target): ?>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h2><?= $target->getLastname() ?></h2>
                    <h3><?= $target->getFirstname() ?></h3>
                    <div>
                        <?php foreach ($target->getMissions() as $mission): ?>
                            <p class="badge bg-dark-subtle"><a
                                    href="/managerKGB/mission/<?= $mission->getId() ?>"
                                    class="text-white link-underline link-underline-opacity-0"><?= $mission->getNamecode() ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($target->getCountries() as $country): ?>
                            <p class="badge bg-primary"><a href="/managerKGB/country/<?= $country->getId() ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= $country->name ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($target->getCountriesMissions() as $countriesMission): ?>
                            <p class="badge bg-warning"><a href="/managerKGB/country/<?= $countriesMission->getId() ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= $countriesMission->name ?></a>
                            </p>
                        <?php endforeach; ?>
                    </div>
                    <a href="/managerKGB/target/<?= $target->getId() ?>" class="btn btn-dark">Lire plus</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
