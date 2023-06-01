<?php


use App\Models\Hideout;

$pages = (new Hideout($this->db))->getPages();
$pagination = (new Hideout($this->db));
$link = "contacts";
?>

<h2 class="m-3">Les Planques</h2>

<div class="row">
    <?php foreach ($params['hideouts'] as $hideout): ?>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h2><?= e($hideout->getCode()) ?></h2>
                    <h3><?= e($hideout->getAddress()) ?></h3>
                    <div>
                        <?php foreach ($hideout->getMissions() as $mission): ?>
                            <p class="badge bg-dark-subtle"><a
                                    href="/managerKGB/mission/<?= e($mission->getId()) ?>"
                                    class="text-white link-underline link-underline-opacity-0"><?= e($mission->name_code) ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($hideout->getCountries() as $country): ?>
                            <p class="badge bg-primary"><a href="/managerKGB/country/<?= e($country->getId()) ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= e($country->name) ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($hideout->getTypes() as $type): ?>
                            <p class="badge bg-success"><a href="/managerKGB/country/<?= e($type->getId()) ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= e($type->name) ?></a>
                            </p>
                        <?php endforeach; ?>
                    </div>
                    <a href="/managerKGB/hideout/<?= e($hideout->getId()) ?>" class="btn btn-dark">Lire plus</a>
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