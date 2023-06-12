<h2><?= isset($params['agent']) ? e($params['agent']->getLastname() . " " . $params['agent']->getFirstname()) : 'Créer un nouvel agent' ?></h2>

<form
    action="<?= isset($params['agent']) ? "/managerKGB/admin/agents/edit/{$params['agent']->getId()}" :
        "/managerKGB/admin/agents/create" ?>"
    method="POST"
    onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')"
>
    <div class="form-group mb-3">
        <label for="lastname"><strong>Nom de l'agent</strong></label>
        <input type="text" class="form-control" id="lastname" name="lastname"
               value="<?= isset($params['agent']) ? e($params['agent']->getLastname()) : '' ?>">
    </div>
    <div class="form-group mb-3">
        <label for="firstname"><strong>Prénom de l'agent</strong></label>
        <input type="text" class="form-control" id="firstname" name="firstname"
               value="<?= isset($params['agent']) ? e($params['agent']->getFirstname()) : '' ?>">
    </div>
    <div class="form-group mb-3">
        <label for="date_of_birth"><strong>Date de naissance de l'agent</strong></label>
        <input type="text" class="form-control" id="date_of_birth" name="date_of_birth"
               value="<?= isset($params['agent']) ? e($params['agent']->getDateOfBirth()) : '' ?>">
    </div>
    <div class="form-group mb-3">
        <label for="id_code"><strong>Code Identification de l'agent</strong></label>
        <input type="text" class="form-control" id="id_code" name="id_code"
               value="<?= isset($params['agent']) ? e($params['agent']->getIdcode()) : '' ?>">
    </div>

    <div class="form-group mb-3">
        <label for="countries"><strong>Nationalité de l'agent</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="countries" name="countries[]">
            <?php foreach ($params['countries'] as $country): ?>
                <option value="<?= $country->getId() ?>"
                    <?php if (isset($params['agent'])): ?>
                        <?php foreach ($params['agent']->getCountries() as $agentCountry) {
                            echo ($country->getId() === $agentCountry->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $country->getNationalities() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="specialities"><strong>Spécialité(s) de l'agent</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="specialities"
                name="specialities[]">
            <?php foreach ($params['specialities'] as $speciality): ?>
                <option value="<?= $speciality->getId() ?>"
                    <?php if (isset($params['agent'])): ?>
                        <?php foreach ($params['agent']->getSpecialities() as $agentSpeciality) {
                            echo ($speciality->getId() === $agentSpeciality->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $speciality->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit"
            class="btn btn-primary"><?= isset($params['agent']) ? 'Enregistrer les modifications' : 'Enregistrer l\'agent' ?></button>
</form>
