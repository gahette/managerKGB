<?php


use App\Models\Agent;

$pages = (new Agent($this->db))->getPages();
$pagination = (new Agent($this->db));
$link = "agents";
?>

<h2>Administration des agents</h2>

<a href="/managerKGB/admin/agents/create" class="btn btn-success my-3">Créer une nouvel agent</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Date de naissance</th>
        <th scope="col">Code d'identification</th>
        <th scope="col">Nationalité</th>
        <th scope="col">Spécialité(s)</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($params['agents'] as $agent): ?>
        <tr>
            <th scope="row"><?= e($agent->getId()) ?></th>
            <td><?= e($agent->getLastname()) ?></td>
            <td><?= e($agent->getFirstname()) ?></td>
            <td><?= e($agent->getDateOfBirth()) ?></td>
            <td><?= e($agent->getIdcode()) ?></td>
            <td>
                <?php foreach ($agent->getCountries() as $k => $country):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($country->nationalities))) ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($agent->getSpecialities() as $k => $speciality):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($speciality->name))) ?>
                <?php endforeach; ?>
            </td>

            <td>
                <a href="/managerKGB/admin/agents/edit/<?= $agent->getId() ?>" class="btn btn-warning">Modifier</a>
                <form action="/managerKGB/admin/agents/delete/<?= $agent->getId() ?>" method="POST" class="d-inline"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cet agent ?')"
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
