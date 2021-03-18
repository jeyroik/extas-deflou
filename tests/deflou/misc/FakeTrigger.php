<?php
namespace tests\deflou\misc;

use extas\components\deflou\dispatchers\TriggerExecutor;
use extas\interfaces\workflows\entities\IEntity;
use extas\interfaces\workflows\transits\ITransitResult;

/**
 * Class FakeTrigger
 *
 * @package tests\deflou\misc
 * @author jeyroik <jeyroik@gmail.com>
 */
class FakeTrigger extends TriggerExecutor
{
    public const FIELD__TRIGGER_PARAMS = 'tp';

    /**
     * @param ITransitResult $result
     * @param IEntity $entityEdited
     * @return bool
     */
    public function __invoke(ITransitResult &$result, IEntity &$entityEdited): bool
    {
        $entityEdited[static::FIELD__TRIGGER_PARAMS] = $this->getParametersValues();

        return true;
    }
}
