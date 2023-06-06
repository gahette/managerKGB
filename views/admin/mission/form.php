<h2><?= isset($params['mission']) ? e($params['mission']->getTitle()) : 'Créer une nouvelle mission' ?></h2>

<form
        action="<?= isset($params['mission']) ? "/managerKGB/admin/missions/edit/{$params['mission']->getId()}" :
            "/managerKGB/admin/missions/create" ?>"
        method="POST"
        onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')"
>
    <div class="form-group">
        <label for="title">Titre de la mission</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= isset($params['mission']) ? e($params['mission']->getTitle()) : '' ?>">
    </div>
    <div class="form-group">
        <label for="name_code">Nom de code de la mission</label>
        <input type="text" class="form-control" id="name_code" name="name_code"
               value="<?= isset($params['mission']) ? e($params['mission']->getNamecode()) : '' ?>">
    </div>
    <div class="form-group">
        <?php date_default_timezone_set('Europe/Paris') ?>
        <label for="closed_at">Modifié le</label>
        <input type="text" class="form-control" id="closed_at" name="closed_at" value="<?= date('Y-m-d H:i') ?>">
    </div>
    <div class="form-group">
        <label for="content">Description de la mission</label>
        <textarea name="content" id="content" rows="8"
                  class="form-control"><?= isset($params['mission']) ? e($params['mission']->getContent()) : '' ?></textarea>
    </div>


    <div class="form-group">
        <label for="status">Status de la mission</label>
        <select class="form-select" multiple aria-label="multiple select example" id="status" name="status[]">
            <?php foreach ($params['status'] as $statu): ?>
                <option class="option" value="<?= $statu->getId() ?>"
                    <?php if (isset($params['mission'])): ?>
                        <?php foreach ($params['mission']->getStatus() as $missionStatus) {
                            echo ($statu->getId() === $missionStatus->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $statu->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="countries">Pays de la mission</label>
        <select class="form-select" multiple aria-label="multiple select example" id="countries" name="countries[]">
            <?php foreach ($params['countries'] as $country): ?>
                <option value="<?= $country->getId() ?>"
                    <?php foreach ($params['mission']->getCountries() as $missionCountry) {
                        echo ($country->getId() === $missionCountry->getId()) ? 'selected' : '';
                    }
                    ?>
                ><?= $country->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="types">Type de la mission</label>
        <select class="form-select" multiple aria-label="multiple select example" id="types" name="types[]">
            <?php foreach ($params['typesMissions'] as $typesMission): ?>
                <option value="<?= $typesMission->getId() ?>"
                    <?php foreach ($params['mission']->getTypesMissions() as $missionTypeMission) {
                        echo ($typesMission->getId() === $missionTypeMission->getId()) ? 'selected' : '';
                    }
                    ?>
                ><?= $typesMission->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="specialities">Spécialité(s) pour cette mission</label>
        <select class="form-select" multiple aria-label="multiple select example" id="specialities" name="specialities[]">
            <?php foreach ($params['specialities'] as $speciality): ?>
                <option value="<?= $speciality->getId() ?>"
                    <?php foreach ($params['mission']->getSpecialities() as $missionSpeciality) {
                        echo ($speciality->getId() === $missionSpeciality->getId()) ? 'selected' : '';
                    }
                    ?>
                ><?= $speciality->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="agents">Agent(s) pour cette mission</label>
        <select class="form-select" multiple aria-label="multiple select example" id="agents" name="agents[]">
            <?php foreach ($params['agents'] as $agent): ?>
                <option value="<?= $agent->getId() ?>"
                    <?php foreach ($params['mission']->getAgents() as $missionAgent) {
                        echo ($agent->getId() === $missionAgent->getId()) ? 'selected' : '';
                    }
                    ?>
                ><?= $agent->getLastname() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="targets">Cible(s) pour cette mission</label>
        <select class="form-select" multiple aria-label="multiple select example" id="targets" name="targets[]">
            <?php foreach ($params['targets'] as $target): ?>
                <option value="<?= $target->getId() ?>"
                    <?php foreach ($params['mission']->getTargets() as $missionTarget) {
                        echo ($target->getId() === $missionTarget->getId()) ? 'selected' : '';
                    }
                    ?>
                ><?= $target->getLastname() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="contacts">Contact(s) pour cette mission</label>
        <select class="form-select" multiple aria-label="multiple select example" id="contacts" name="contacts[]">
            <?php foreach ($params['contacts'] as $contact): ?>
                <option value="<?= $contact->getId() ?>"
                    <?php foreach ($params['mission']->getContacts() as $missionContact) {
                        echo ($contact->getId() === $missionContact->getId()) ? 'selected' : '';
                    }
                    ?>
                ><?= $contact->getLastname() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="hideouts">Planque(s) pour cette mission</label>
        <select class="form-select" multiple aria-label="multiple select example" id="hideouts" name="hideouts[]">
            <?php foreach ($params['hideouts'] as $hideout): ?>
                <option value="<?= $hideout->getId() ?>"
                    <?php foreach ($params['mission']->getHideouts() as $missionHideout) {
                        echo ($hideout->getId() === $missionHideout->getId()) ? 'selected' : '';
                    }
                    ?>
                ><?= $hideout->getAddress() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary"><?= isset($params['mission']) ? 'Enregistrer les modifications' : 'Enregistrer la mission' ?></button>
</form>