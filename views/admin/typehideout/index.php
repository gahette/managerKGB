<?php


use App\Models\TypeHideout;

$pages = (new TypeHideout($this->db))->getPages();
$pagination = (new TypeHideout($this->db));
$link = "types_hideouts";
?>

<h2>Administration des types de planques</h2>

<a href="/managerKGB/admin/typeshideouts/create" class="btn btn-success my-3">Créer un nouveau type de planque</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($params['typeHideouts'] as $typeHideout): ?>
        <tr>
            <th scope="row"><?= e($typeHideout->getId()) ?></th>
            <td><?= e($typeHideout->getName()) ?></td>
            <td>
                <a href="/managerKGB/admin/typeshideouts/edit/<?= $typeHideout->getId() ?>" class="btn btn-warning">Modifier</a>
                <form action="/managerKGB/admin/typeshideouts/delete/<?= $typeHideout->getId() ?>" method="POST" class="d-inline"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer ce type de planque ?')"
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

