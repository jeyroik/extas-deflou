<?php
namespace extas\components\deflou\states;

use extas\components\Item;
use extas\components\THasId;
use extas\components\workflows\entities\THasEntity;
use extas\components\workflows\states\THasState;
use extas\interfaces\deflou\states\IStateToEntityMap;

/**
 * Class StateToEntityMap
 *
 * @package extas\components\deflou\states
 * @author jeyroik <jeyroik@gmail.com>
 */
class StateToEntityMap extends Item implements IStateToEntityMap
{
    use THasState;
    use THasEntity;
    use THasId;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
