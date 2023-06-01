<?php


use App\Models\Contact;

$pages = (new Contact($this->db))->getPages();
$pagination = (new Contact($this->db));
$link = "contacts";
?>

<h2 class="m-3">Les Contacts</h2>

<div class="row">
    <?php foreach ($params['contacts'] as $contact): ?>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h2><?= e($contact->getLastname()) ?></h2>
                    <h3><?= e($contact->getFirstname()) ?></h3>
                    <div>
                        <?php foreach ($contact->getMissions() as $mission): ?>
                            <p class="badge bg-dark-subtle"><a
                                    href="/managerKGB/mission/<?= e($mission->getId()) ?>"
                                    class="text-white link-underline link-underline-opacity-0"><?= e($mission->getNamecode()) ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($contact->getCountries() as $country): ?>
                            <p class="badge bg-primary"><a href="/managerKGB/country/<?= e($country->getId()) ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= e($country->name) ?></a>
                            </p>
                        <?php endforeach; ?>
                        <?php foreach ($contact->getCountriesMissions() as $countriesMission): ?>
                            <p class="badge bg-warning"><a href="/managerKGB/country/<?= e($countriesMission->getId()) ?>"
                                                           class="text-white link-underline link-underline-opacity-0"><?= e($countriesMission->name) ?></a>
                            </p>
                        <?php endforeach; ?>
                    </div>
                    <a href="/managerKGB/contact/<?= e($contact->getId()) ?>" class="btn btn-dark">Lire plus</a>
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