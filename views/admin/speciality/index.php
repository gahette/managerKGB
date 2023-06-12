<?php


use App\Models\Speciality;

$pages = (new Speciality($this->db))->getPages();
$pagination = (new Speciality($this->db));
$link = "specialities";
?>

<h2>Administration des spécialité</h2>

<a href="/managerKGB/admin/specialities/create" class="btn btn-success my-3">Créer une nouvelle spécialité</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($params['specialities'] as $speciality): ?>
        <tr>
            <th scope="row"><?= e($speciality->getId()) ?></th>
            <td><?= e($speciality->getName()) ?></td>
            <td>
                <a href="/managerKGB/admin/specialities/edit/<?= $speciality->getId() ?>" class="btn btn-warning">Modifier</a>
                <form action="/managerKGB/admin/specialities/delete/<?= $speciality->getId() ?>" method="POST" class="d-inline"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cette spécialité ?')"
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
