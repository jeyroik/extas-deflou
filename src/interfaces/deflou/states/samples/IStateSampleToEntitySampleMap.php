<?php
namespace extas\interfaces\deflou\states\samples;

use extas\interfaces\IHasId;
use extas\interfaces\IItem;
use extas\interfaces\workflows\entities\IHasEntitySample;
use extas\interfaces\workflows\states\IHasStateSample;

/**
 * Interface IStateSampleToEntitySampleMap
 *
 * @package extas\interfaces\deflou\states\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IStateSampleToEntitySampleMap extends IItem, IHasEntitySample, IHasId, IHasStateSample
{
    public const SUBJECT = 'extas.df.state.sample.to.entity.sample.map';
}
