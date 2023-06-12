<?php


use App\Models\Contact;

$pages = (new Contact($this->db))->getPages();
$pagination = (new Contact($this->db));
$link = "contacts";
?>

<h2>Administration des contacts</h2>

<a href="/managerKGB/admin/contacts/create" class="btn btn-success my-3">Créer un nouveau contact</a>

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
    <?php foreach ($params['contacts'] as $contact): ?>
        <tr>
            <th scope="row"><?= e($contact->getId()) ?></th>
            <td><?= e($contact->getLastname()) ?></td>
            <td><?= e($contact->getFirstname()) ?></td>
            <td><?= e($contact->getDateOfBirth()) ?></td>
            <td><?= e($contact->getNamecode()) ?></td>
            <td>
                <?php foreach ($contact->getCountries() as $k => $country):
                    if ($k > 0):
                        echo ', ';
                    endif;
                    ?>
                    <?= ucfirst(strtolower(e($country->nationalities))) ?>
                <?php endforeach; ?>
            </td>

            <td>
                <a href="/managerKGB/admin/contacts/edit/<?= $contact->getId() ?>" class="btn btn-warning">Modifier</a>
                <form action="/managerKGB/admin/contacts/delete/<?= $contact->getId() ?>" method="POST" class="d-inline"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer ce contact ?')"
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

