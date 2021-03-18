<?php
namespace extas\components\deflou\dispatchers;

use extas\components\THasContext;
use extas\components\workflows\transitions\dispatchers\TransitionDispatcher;
use extas\interfaces\IItem;
use extas\interfaces\stages\IStageDeFlouBeforeTriggerExecute;
use extas\interfaces\workflows\entities\IEntity;
use extas\interfaces\workflows\transitions\dispatchers\ITransitionDispatcherExecutor;
use extas\interfaces\workflows\transits\ITransitResult;

/**
 * Class TriggerExecutor
 *
 * Replace parameters with entity attributes by templates.
 *
 * @package extas\components\deflou\dispatchers
 * @author jeyroik <jeyroik@gmail.com>
 */
abstract class TriggerExecutor extends TransitionDispatcher implements ITransitionDispatcherExecutor
{
    use THasContext;

    /**
     * @param IItem $context
     * @param ITransitResult $result
     * @param IEntity $entityEdited
     * @return bool
     * @throws \Exception
     */
    public function dispatch(IItem $context, ITransitResult &$result, IEntity &$entityEdited): bool
    {
        $triggerParameters = $this->getParametersValues();

        foreach($this->getPluginsByStage(IStageDeFlouBeforeTriggerExecute::NAME) as $plugin) {
            /**
             * @var IStageDeFlouBeforeTriggerExecute $plugin
             */
            $plugin($triggerParameters, $this, $context, $entityEdited);
        }

        $this->setParametersValues($triggerParameters);

        return parent::dispatch($context, $result, $entityEdited);
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'extas.transition.dispatcher.executor';
    }
}
