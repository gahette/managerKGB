<h2><?= isset($params['hideout']) ? e($params['hideout']->getCode()) : 'Créer une nouvelle planque' ?></h2>

<form
    action="<?= isset($params['hideout']) ? "/managerKGB/admin/hideouts/edit/{$params['hideout']->getId()}" :
        "/managerKGB/admin/hideouts/create" ?>"
    method="POST"
    onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')"
>
    <div class="form-group mb-3">
        <label for="code"><strong>Code de la planque</strong></label>
        <input type="text" class="form-control" id="code" name="code"
               value="<?= isset($params['hideout']) ? e($params['hideout']->getCode()) : '' ?>">
    </div>
    <div class="form-group mb-3">
        <label for="address"><strong>Adresse de la planque</strong></label>
        <input type="text" class="form-control" id="address" name="address"
               value="<?= isset($params['hideout']) ? e($params['hideout']->getAddress()) : '' ?>">
    </div>

    <div class="form-group mb-3">
        <label for="countries"><strong>Pays de la planque</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="countries" name="countries[]">
            <?php foreach ($params['countries'] as $country): ?>
                <option value="<?= $country->getId() ?>"
                    <?php if (isset($params['hideout'])): ?>
                        <?php foreach ($params['hideout']->getCountries() as $hideoutCountry) {
                            echo ($country->getId() === $hideoutCountry->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $country->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="types"><strong>Type de planque</strong></label>
        <select class="form-select" multiple aria-label="multiple select example" id="types"
                name="types[]">
            <?php foreach ($params['typesHideouts'] as $typesHideout): ?>
                <option value="<?= $typesHideout->getId() ?>"
                    <?php if (isset($params['hideout'])): ?>
                        <?php foreach ($params['hideout']->getTypes() as $hideoutType) {
                            echo ($typesHideout->getId() === $hideoutType->getId()) ? 'selected' : '';
                        }
                        ?>
                    <?php endif; ?>
                ><?= $typesHideout->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit"
            class="btn btn-primary"><?= isset($params['hideout']) ? 'Enregistrer les modifications' : 'Enregistrer la planque' ?></button>
</form>
