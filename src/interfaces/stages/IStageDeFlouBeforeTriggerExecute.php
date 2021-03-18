<?php
namespace extas\interfaces\stages;

use extas\interfaces\IItem;
use extas\interfaces\workflows\entities\IEntity;
use extas\interfaces\workflows\transitions\dispatchers\ITransitionDispatcherExecutor;

/**
 * Interface IStageDeFlouBeforeTriggerExecute
 *
 * @package extas\interfaces\stages
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IStageDeFlouBeforeTriggerExecute
{
    public const NAME = 'extas.deflou.before.trigger.execute';

    /**
     * @param array $parameters
     * @param ITransitionDispatcherExecutor $trigger
     * @param IItem $context
     * @param IEntity $entity
     */
    public function __invoke(
        array &$parameters,
        ITransitionDispatcherExecutor $trigger,
        IItem $context,
        IEntity $entity
    ): void;
}
