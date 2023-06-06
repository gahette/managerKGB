<?php

use App\Models\Mission;

$pages = (new Mission($this->db))->getPages();
$pagination = (new Mission($this->db));
$link = "missions";
?>

<h2>Administration des missions</h2>

<a href="/managerKGB/admin/missions/create" class="btn btn-success my-3">Créer une nouvelle mission</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        <th scope="col">Nom de code</th>
        <th scope="col">Crée le</th>
        <th scope="col">Modifiée le</th>
        <th scope="col">Status</th>
        <th scope="col">Théâtre opération</th>
        <th scope="col">Type</th>
        <th scope="col">Spécialité(s)</th>
        <th scope="col">Agent(s) affecté(s)</th>
        <th scope="col">Cible(s)</th>
        <th scope="col">Contact(s)</th>
        <th scope="col">Planque(s) utilisée(s)</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($params['missions'] as $mission): ?>
        <tr>
            <th scope="row"><?= e($mission->getId()) ?></th>
            <td><?= e($mission->getTitle()) ?></td>
            <td><?= e($mission->getNamecode()) ?></td>
            <td><?= e($mission->getCreatedat()) ?></td>
            <td><?= e($mission->getClosedat()) ?></td>
            <td>
                <?php foreach ($mission->getStatus() as $k => $statu):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($statu->name))) ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($mission->getCountries() as $k => $country):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($country->name))) ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($mission->getTypesMissions() as $k => $typesMission):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($typesMission->name))) ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($mission->getSpecialities() as $k => $speciality):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($speciality->name))) ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($mission->getAgents() as $k => $agent):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($agent->lastname . " " . $agent->firstname))) ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($mission->getTargets() as $k => $target):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($target->getNamecode()))) ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($mission->getContacts() as $k => $contact):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($contact->getNamecode()))) ?>
                <?php endforeach; ?>
            </td>
            <td>   <?php foreach ($mission->getHideouts() as $k => $hideout):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($hideout->code))) ?>
                <?php endforeach; ?>
            </td>
            <td><?= e($mission->getExcerpt2()) ?></td>
            <td>
                <a href="/managerKGB/admin/missions/edit/<?= $mission->getId() ?>" class="btn btn-warning">Modifier</a>
                <form action="/managerKGB/admin/missions/delete/<?= $mission->getId() ?>" method="POST" class="d-inline"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cette mission ?')"
                >
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
<!--        <tr>-->
<!--            <th scope="row">2</th>-->
<!--            <td>Jacob</td>-->
<!--            <td>Thornton</td>-->
<!--            <td>@fat</td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <th scope="row">3</th>-->
<!--            <td colspan="2">Larry the Bird</td>-->
<!--            <td>@twitter</td>-->
<!--        </tr>-->
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