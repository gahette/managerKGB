<h2><?= isset($params['target']) ? e($params['target']->getLastname() . " " . $params['target']->getFirstname()) : 'Créer une nouvelle cible' ?></h2>

<form
        action="<?= isset($params['target']) ? "/managerKGB/admin/targets/edit/{$params['target']->getId()}" :
            "/managerKGB/admin/targets/create" ?>"
        method="POST"
        onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')"
>
    <div class="form-group mb-3">
        <label for="lastname"><strong>Nom de la cible</strong></label>
        <input type="text" class="form-control" id="lastname" name="lastname"
               value="<?= isset($params['target']) ? e($params['target']->getLastname()) : '' ?>">
    </div>
    <div class="form-group mb-3">
        <label for="firstname"><strong>Prénom de la cible</strong></label>
        <input type="text" class="form-control" id="firstname" name="firstname"
               value="<?= isset($params['target']) ? e($params['target']->getFirstname()) : '' ?>">
    </div>
    <div class="form-group">
        <label for="date_of_birth"><strong>Date de naissance de la cible</strong></label>
        <div class="datepicker date input-group">
            <input type="text"  class="form-control" id="date_of_birth" name="date_of_birth"
                   value="<?= isset($params['target']) ? e($params['target']->getDateOfBirth()) : '' ?>">
            <div class="input-group-append">

            </div>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="name_code"><strong>Nom de code de la cible</strong></label>
        <input type="text" class="form-control" id="name_code" name="name_code"
               value="<?= isset($params['target']) ? e($params['target']->getNamecode()) : '' ?>">
    </div>

    <div class="form-group mb-3">
        <label for="countries"><strong>Nationalité de la cible</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="countries" name="countries[]">
            <?php foreach ($params['countries'] as $country): ?>
                <option value="<?= $country->getId() ?>"
                    <?php if (isset($params['target'])): ?>
                        <?php foreach ($params['target']->getCountries() as $agentCountry) {
                            echo ($country->getId() === $agentCountry->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $country->getNationalities() ?></option>
            <?php endforeach; ?>
        </select>
    </div>


    <button type="submit"
            class="btn btn-primary"><?= isset($params['target']) ? 'Enregistrer les modifications' : 'Enregistrer la cible' ?></button>
</form>
