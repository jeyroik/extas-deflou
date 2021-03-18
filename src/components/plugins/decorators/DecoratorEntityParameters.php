<?php
namespace extas\components\plugins\decorators;

use extas\components\plugins\Plugin;
use extas\components\Replace;
use extas\interfaces\IItem;
use extas\interfaces\stages\IStageDeFlouBeforeTriggerExecute;
use extas\interfaces\workflows\entities\IEntity;
use extas\interfaces\workflows\transitions\dispatchers\ITransitionDispatcherExecutor;

/**
 * Class DecoratorEntityParameters
 *
 * @package extas\components\plugins\decorators
 * @author jeyroik <jeyroik@gmail.com>
 */
class DecoratorEntityParameters extends Plugin implements IStageDeFlouBeforeTriggerExecute
{
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
    ): void
    {
        $parameters = Replace::please()->apply($entity->__toArray())->to($parameters);
    }
}
