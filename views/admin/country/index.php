<?php

use App\Models\Country;

$pages = (new Country($this->db))->getPages();
$pagination = (new Country($this->db));
$link = "countries";
?>

<h2>Administration des pays</h2>

<a href="/managerKGB/admin/countries/create" class="btn btn-success my-3">Créer un nouveau pays</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Nationalité</th>
        <th scope="col">Code ISO3166</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($params['countries'] as $country): ?>
        <tr>
            <th scope="row"><?= e($country->getId()) ?></th>
            <td><?= e($country->getName()) ?></td>
            <td><?= e($country->getNationalities()) ?></td>
            <td><?= e($country->getIso3166()) ?></td>

            <td>
                <a href="/managerKGB/admin/countries/edit/<?= $country->getId() ?>" class="btn btn-warning">Modifier</a>
                <form action="/managerKGB/admin/countries/delete/<?= $country->getId() ?>" method="POST" class="d-inline"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer ce pays ?')"
                >
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

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