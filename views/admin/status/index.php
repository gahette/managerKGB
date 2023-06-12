<?php


use App\Models\Status;

$pages = (new Status($this->db))->getPages();
$pagination = (new Status($this->db));
$link = "status";
?>

<h2>Administration des pays</h2>

<a href="/managerKGB/admin/status/create" class="btn btn-success my-3">Créer un nouvel état</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($params['status'] as $status): ?>
        <tr>
            <th scope="row"><?= e($status->getId()) ?></th>
            <td><?= e($status->getName()) ?></td>
            <td>
                <a href="/managerKGB/admin/status/edit/<?= $status->getId() ?>" class="btn btn-warning">Modifier</a>
                <form action="/managerKGB/admin/status/delete/<?= $status->getId() ?>" method="POST" class="d-inline"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cet état ?')"
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
