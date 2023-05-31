<div class="card m-5">
    <div class="card-body">
        <h2 class="text-info"><?= $params['country']->getName() ?></h2>
        <!--<span><a-->
        <!--            href="https://fr.wikipedia.org/wiki/-->
        <?php //= ucwords(strtolower(lower_accent($params['country']->getName()))) ?><!--"-->
        <!--            target="_blank">--><?php //= $params['country']->getName() ?><!--</a>-->
        <!--</span>-->
        <p>Nationalité : <?= $params['country']->getNationalities() ?></p>
        <p>Code iso3166 : <?= $params['country']->getIso3166() ?></p>

        <div>
            <?php if ($params['country']->getMissions() !== []): ?>
                <p>Mission <?= $params['country']->getNationalities() ?> :
                    <?php foreach ($params['country']->getMissions() as $k => $mission): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a class="text-black link-underline link-underline-opacity-0"
                                 href="/managerKGB/mission/<?= $mission->getId() ?>"><?= $mission->title ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucune Mission</p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getAgents() !== []): ?>
                <p>Agent(s) de nationalité <?= $params['country']->getNationalities() ?> :
                    <?php foreach ($params['country']->getAgents() as $k => $agent): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a class="text-primary link-underline link-underline-opacity-0"
                                 href="/managerKGB/agent/<?= $agent->getId() ?>"><?= $agent->lastname . " " . $agent->firstname ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucun agent est de nationalité <?= $params['country']->getNationalities() ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getContacts() !== []): ?>
                <p>Contact(s) de nationalité <?= $params['country']->getNationalities() ?> :
                    <?php foreach ($params['country']->getContacts() as $k => $contact): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a class="text-secondary link-underline link-underline-opacity-0"
                                 href="/managerKGB/contact/<?= $contact->getId() ?>"><?= $contact->lastname . " " . $contact->firstname ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucun contact est de nationalité <?= $params['country']->getNationalities() ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getTargets() !== []): ?>
                <p>Cible(s) de nationalité <?= $params['country']->getNationalities() ?> :
                    <?php foreach ($params['country']->getTargets() as $k => $target): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a class="text-danger link-underline link-underline-opacity-0"
                                 href="/managerKGB/target/<?= $target->getId() ?>"><?= $target->lastname . " " . $target->firstname ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucune cible est de nationalité <?= $params['country']->getNationalities() ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getHideouts() !== []): ?>
                <p>Planque(s) en <?= $params['country']->getName() ?> :
                    <?php foreach ($params['country']->getHideouts() as $k => $hideout): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a class="text-warning link-underline link-underline-opacity-0"
                                 href="/managerKGB/hideout/<?= $hideout->getId() ?>"><?= $hideout->address ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucune planque en <?= $params['country']->getName() ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getAgentsMissions() !== []): ?>
                <p>Agents au <?= $params['country']->getName() ?> :
                    <?php foreach ($params['country']->getAgentsMissions() as $k => $agentsMission): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a href="/managerKGB/agent/<?= $agentsMission->getId() ?>"
                                 class="text-primary link-underline link-underline-opacity-0"><?= $agentsMission->lastname ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucun agent(s) en <?= $params['country']->getName() ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getContactsMissions() !== []): ?>
                <p>Contacts au <?= $params['country']->getName() ?> :
                    <?php foreach ($params['country']->getContactsMissions() as $k => $contactsMission): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a href="/managerKGB/contact/<?= $contactsMission->getId() ?>"
                                 class="text-primary link-underline link-underline-opacity-0"><?= $contactsMission->lastname ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucun contact(s) en <?= $params['country']->getName() ?></p>
            <?php endif; ?>
        </div>
        <div>
            <?php if ($params['country']->getTargetsMissions() !== []): ?>
                <p>Cibles au <?= $params['country']->getName() ?> :
                    <?php foreach ($params['country']->getTargetsMissions() as $k => $targetsMission): ?>
                        <?php if ($k > 0): ?>
                            ,
                        <?php endif; ?>
                        <span><a href="/managerKGB/target/<?= $targetsMission->getId() ?>"
                                 class="text-primary link-underline link-underline-opacity-0"><?= $targetsMission->lastname ?></a></span>
                    <?php endforeach; ?>
                </p>
            <?php else: ?>
                <p>Aucune cible(s) en <?= $params['country']->getName() ?></p>
            <?php endif; ?>
        </div>


        <a href="/managerKGB/countries" class="btn btn-dark">Retourner aux pays</a>

    </div>
</div>