<?php
namespace extas\components\deflou\states\samples;

use extas\components\Item;
use extas\components\THasId;
use extas\components\workflows\entities\THasEntitySample;
use extas\components\workflows\states\THasStateSample;
use extas\interfaces\deflou\states\samples\IStateSampleToEntitySampleMap;

/**
 * Class StateSampleToEntitySampleMap
 *
 * @package extas\components\deflou\states\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
class StateSampleToEntitySampleMap extends Item implements IStateSampleToEntitySampleMap
{
    use THasStateSample;
    use THasEntitySample;
    use THasId;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
