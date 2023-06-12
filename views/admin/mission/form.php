<h2><?= isset($params['mission']) ? e($params['mission']->getTitle()) : 'Créer une nouvelle mission' ?></h2>

<form
        action="<?= isset($params['mission']) ? "/managerKGB/admin/missions/edit/{$params['mission']->getId()}" :
            "/managerKGB/admin/missions/create" ?>"
        method="POST"
        onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')"
>
    <div class="form-group mb-3">
        <label for="title"><strong>Titre de la mission</strong></label>
        <input type="text" class="form-control" id="title" name="title"
               value="<?= isset($params['mission']) ? e($params['mission']->getTitle()) : '' ?>">
    </div>
    <div class="form-group mb-3">
        <label for="name_code"><strong>Nom de code de la mission</strong></label>
        <input type="text" class="form-control" id="name_code" name="name_code"
               value="<?= isset($params['mission']) ? e($params['mission']->getNamecode()) : '' ?>">
    </div>
    <div class="form-group mb-3">
        <?php date_default_timezone_set('Europe/Paris') ?>
        <label for="closed_at"><strong>Modifié</strong> le</label>
        <input type="text" class="form-control" id="closed_at" name="closed_at" value="<?= date('Y-m-d H:i') ?>">
    </div>
    <div class="form-group mb-3">
        <label for="content"><strong>Description de la mission</strong></label>
        <textarea name="content" id="content" rows="8"
                  class="form-control"><?= isset($params['mission']) ? e($params['mission']->getContent()) : '' ?></textarea>
    </div>


    <div class="form-group mb-3">
        <label for="status"><strong>Status de la mission</strong></label>
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

    <div class="form-group mb-3">
        <label for="countries"><strong>Pays de la mission</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="countries" name="countries[]">
            <?php foreach ($params['countries'] as $country): ?>
                <option value="<?= $country->getId() ?>"
                    <?php if (isset($params['mission'])): ?>
                        <?php foreach ($params['mission']->getCountries() as $missionCountry) {
                            echo ($country->getId() === $missionCountry->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $country->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="types"><strong>Type de la mission</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="types" name="types[]">
            <?php foreach ($params['typesMissions'] as $typesMission): ?>
                <option value="<?= $typesMission->getId() ?>"
                    <?php if (isset($params['mission'])): ?>
                        <?php foreach ($params['mission']->getTypesMissions() as $missionTypeMission) {
                            echo ($typesMission->getId() === $missionTypeMission->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $typesMission->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="specialities"><strong>Spécialité(s) pour cette mission</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="specialities"
                name="specialities[]">
            <?php foreach ($params['specialities'] as $speciality): ?>
                <option value="<?= $speciality->getId() ?>"
                    <?php if (isset($params['mission'])): ?>
                        <?php foreach ($params['mission']->getSpecialities() as $missionSpeciality) {
                            echo ($speciality->getId() === $missionSpeciality->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $speciality->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="agents"><strong>Agent(s) pour cette mission</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="agents" name="agents[]">
            <?php foreach ($params['agents'] as $agent): ?>
                <option value="<?= $agent->getId() ?>"
                    <?php if (isset($params['mission'])): ?>
                        <?php foreach ($params['mission']->getAgents() as $missionAgent) {
                            echo ($agent->getId() === $missionAgent->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $agent->getLastname() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="targets"><strong>Cible(s) pour cette mission</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="targets" name="targets[]">
            <?php foreach ($params['targets'] as $target): ?>
                <option value="<?= $target->getId() ?>"
                    <?php if (isset($params['mission'])): ?>
                        <?php foreach ($params['mission']->getTargets() as $missionTarget) {
                            echo ($target->getId() === $missionTarget->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $target->getLastname() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="contacts"><strong>Contact(s) pour cette mission</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="contacts" name="contacts[]">
            <?php foreach ($params['contacts'] as $contact): ?>
                <option value="<?= $contact->getId() ?>"
                    <?php if (isset($params['mission'])): ?>
                        <?php foreach ($params['mission']->getContacts() as $missionContact) {
                            echo ($contact->getId() === $missionContact->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $contact->getLastname() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="hideouts"><strong>Planque(s) pour cette mission</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="hideouts" name="hideouts[]">
            <?php foreach ($params['hideouts'] as $hideout): ?>
                <option value="<?= $hideout->getId() ?>"
                    <?php if (isset($params['mission'])): ?>
                        <?php foreach ($params['mission']->getHideouts() as $missionHideout) {
                            echo ($hideout->getId() === $missionHideout->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $hideout->getAddress() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit"
            class="btn btn-primary"><?= isset($params['mission']) ? 'Enregistrer les modifications' : 'Enregistrer la mission' ?></button>
</form>