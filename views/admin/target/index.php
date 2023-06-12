<?php


use App\Models\Target;

$pages = (new Target($this->db))->getPages();
$pagination = (new Target($this->db));
$link = "targets";
?>

<h2>Administration des cibles</h2>

<a href="/managerKGB/admin/targets/create" class="btn btn-success my-3">Créer une nouvelle cible</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Date de naissance</th>
        <th scope="col">Nom de code</th>
        <th scope="col">Nationalité</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($params['targets'] as $target): ?>
        <tr>
            <th scope="row"><?= e($target->getId()) ?></th>
            <td><?= e($target->getLastname()) ?></td>
            <td><?= e($target->getFirstname()) ?></td>
            <td><?= e($target->getDateOfBirth()) ?></td>
            <td><?= e($target->getNamecode()) ?></td>
            <td>
                <?php foreach ($target->getCountries() as $k => $country):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($country->nationalities))) ?>
                <?php endforeach; ?>
            </td>

            <td>
                <a href="/managerKGB/admin/targets/edit/<?= $target->getId() ?>" class="btn btn-warning">Modifier</a>
                <form action="/managerKGB/admin/targets/delete/<?= $target->getId() ?>" method="POST" class="d-inline"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cette cible ?')"
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

