<div class="card m-5">
    <div class="card-body">
        <h2><a
                    class="text-info link-underline link-underline-opacity-0"
                    href="https://fr.wikipedia.org/wiki/
        <?= ucwords(strtolower(lower_accent(e($params['country']->getName())))) ?>"
                    target="_blank"><?= e($params['country']->getName()) ?></a>
        </h2>
        <p>Nationalité : <?= e($params['country']->getNationalities()) ?></p>
        <p>Code iso3166 : <?= e($params['country']->getIso3166()) ?></p>

        <div>
            <?php if ($params['country']->getMissions() !== []): ?>
                <p>Mission <?= e($params['country']->getNationalities()) ?> :
                    <?php foreach ($params['country']->getMissions() as $k => $mission): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a class="text-black link-underline link-underline-opacity-0"
                                 href="/managerKGB/mission/<?= e($mission->getId()) ?>"><?= e($mission->title) ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucune Mission</p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getAgents() !== []): ?>
                <p>Agent(s) de nationalité <?= e($params['country']->getNationalities()) ?> :
                    <?php foreach ($params['country']->getAgents() as $k => $agent): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a class="text-primary link-underline link-underline-opacity-0"
                                 href="/managerKGB/agent/<?= e($agent->getId()) ?>"><?= e($agent->lastname . " " . $agent->firstname) ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucun agent est de nationalité <?= e($params['country']->getNationalities()) ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getContacts() !== []): ?>
                <p>Contact(s) de nationalité <?= e($params['country']->getNationalities()) ?> :
                    <?php foreach ($params['country']->getContacts() as $k => $contact): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a class="text-secondary link-underline link-underline-opacity-0"
                                 href="/managerKGB/contact/<?= e($contact->getId()) ?>"><?= e($contact->lastname . " " . $contact->firstname) ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucun contact est de nationalité <?= e($params['country']->getNationalities()) ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getTargets() !== []): ?>
                <p>Cible(s) de nationalité <?= e($params['country']->getNationalities()) ?> :
                    <?php foreach ($params['country']->getTargets() as $k => $target): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a class="text-danger link-underline link-underline-opacity-0"
                                 href="/managerKGB/target/<?= e($target->getId()) ?>"><?= e($target->lastname . " " . $target->firstname) ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucune cible est de nationalité <?= e($params['country']->getNationalities()) ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getHideouts() !== []): ?>
                <p>Planque(s) en <?= e($params['country']->getName()) ?> :
                    <?php foreach ($params['country']->getHideouts() as $k => $hideout): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a class="text-warning link-underline link-underline-opacity-0"
                                 href="/managerKGB/hideout/<?= e($hideout->getId()) ?>"><?= e($hideout->address) ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucune planque en <?= e($params['country']->getName()) ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getAgentsMissions() !== []): ?>
                <p>Agents au <?= e($params['country']->getName()) ?> :
                    <?php foreach ($params['country']->getAgentsMissions() as $k => $agentsMission): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a href="/managerKGB/agent/<?= e($agentsMission->getId()) ?>"
                                 class="text-primary link-underline link-underline-opacity-0"><?= e($agentsMission->lastname) ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucun agent(s) en <?= e($params['country']->getName()) ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getContactsMissions() !== []): ?>
                <p>Contacts au <?= $params['country']->getName() ?> :
                    <?php foreach ($params['country']->getContactsMissions() as $k => $contactsMission): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a href="/managerKGB/contact/<?= e($contactsMission->getId()) ?>"
                                 class="text-primary link-underline link-underline-opacity-0"><?= e($contactsMission->lastname) ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucun contact(s) en <?= e($params['country']->getName()) ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getTargetsMissions() !== []): ?>
                <p>Cibles au <?= e($params['country']->getName()) ?> :
                    <?php foreach ($params['country']->getTargetsMissions() as $k => $targetsMission): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a href="/managerKGB/target/<?= e($targetsMission->getId()) ?>"
                                 class="text-primary link-underline link-underline-opacity-0"><?= e($targetsMission->lastname) ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucune cible(s) en <?= e($params['country']->getName()) ?></p>
            <?php endif; ?>
        </div>


        <a href="/managerKGB/countries" class="btn btn-dark">Retourner aux pays</a>

    </div>
</div>