<div class="card m-5">
    <div class="card-body">
        <h2><?= $params['mission']->getTitle() ?></h2>
        <p>
            <small class="text-info">Créée le <?= $params['mission']->getCreatedAt() ?></small>
        </p>
        <p>
            <small class="text-primary">Modifiée le <?= $params['mission']->getClosedAt() ?></small>
        </p>

        <p>Théâtre de la mission :
            <?php foreach ($params['mission']->getCountries() as $country): ?>
                <span><a href="/managerKGB/country/<?= $country->getId() ?>"
                                                class="text-info link-underline link-underline-opacity-0"><?= $country->name ?></a></span>
            <?php endforeach; ?>
        </p>
        <p> Status : <?php foreach ($params['mission']->getStatus() as $status): ?>
                <span class="text-muted"><?= $status->name ?>
                </span><?php endforeach; ?>
        </p>
        <p>
            Type de mission :
            <?php foreach ($params['mission']->getTypesMissions() as $typesMission): ?>
                <span><?= $typesMission->name ?></span>
            <?php endforeach; ?>
        </p>
        <p>
            Nom de code :
            <?= $params['mission']->getNamecode() ?>
        </p>
        <p>
            Spécialité(s) :
            <?php foreach ($params['mission']->getSpecialities() as $speciality): ?>
                <span><?= $speciality->name ?></span>
            <?php endforeach; ?>
        </p>

        <p>Agent(s) affecté(s) à cette mission :
            <?php foreach ($params['mission']->getAgents() as $agent): ?>
                <span><a href="/managerKGB/agent/<?= $agent->getId() ?>"
                                                  class="text-primary link-underline link-underline-opacity-0"><?= $agent->lastname . " " . $agent->firstname?></a></span>
            <?php endforeach; ?>
        </p>
        <p>
            Contact(s) de la mission :
            <?php foreach ($params['mission']->getContacts() as $contact): ?>
                <span><a href="/managerKGB/contact/<?= $contact->getId() ?>"
                                                class="text-secondary link-underline link-underline-opacity-0"><?= $contact->lastname . " " . $contact->firstname ?></a></span>
            <?php endforeach; ?>
        </p>
        <p>
            Cible(s) de la mission :
            <?php foreach ($params['mission']->getTargets() as $target): ?>
                <span><a href="/managerKGB/target/<?= $target->getId() ?>"
                                             class="text-danger link-underline link-underline-opacity-0"><?= $target->lastname . " " . $target->firstname ?></a></span>
            <?php endforeach; ?>
        </p>
        <p>
            Planque(s) utilisée(s) pour la mission :
            <?php foreach ($params['mission']->getHideouts() as $hideout): ?>
                <span><a href="/managerKGB/hideout/<?= $hideout->getId() ?>"
                                              class="text-warning link-underline link-underline-opacity-0"><?= $hideout->address ?></a></span>
            <?php endforeach; ?>
        </p>
        <p>Description de la mission : <br>
            <?= $params['mission']->getContent() ?></p>
        <a href="/managerKGB/missions" class="btn btn-dark mb-4">Retourner aux missions</a>
    </div>

</div>



