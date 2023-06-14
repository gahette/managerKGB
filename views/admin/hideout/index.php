<?php

use App\Models\Hideout;

$pages = (new Hideout($this->db))->getPages();
$pagination = (new Hideout($this->db));
$link = "hideouts";
?>

<h2>Administration des planques</h2>

<a href="/managerKGB/admin/hideouts/create" class="btn btn-success my-3">Créer une nouvelle planque</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Code</th>
        <th scope="col">Adresse</th>
        <th scope="col">Pays</th>
        <th scope="col">Type</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($params['hideouts'] as $hideout): ?>
        <tr>
            <th scope="row"><?= e($hideout->getId()) ?></th>
            <td><?= e($hideout->getCode()) ?></td>
            <td><?= e($hideout->getAddress()) ?></td>
            <td>
                <?php foreach ($hideout->getCountries() as $k => $country):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($country->name))) ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($hideout->getTypes() as $k => $type):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($type->name))) ?>
                <?php endforeach; ?>
            </td>

            <td>
                <a href="/managerKGB/admin/hideouts/edit/<?= $hideout->getId() ?>" class="btn btn-warning">Modifier</a>
                <form action="/managerKGB/admin/hideouts/delete/<?= $hideout->getId() ?>" method="POST" class="d-inline"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cette planque ?')"
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
