<?php
namespace extas\interfaces\deflou\states;

use extas\interfaces\IHasId;
use extas\interfaces\IItem;
use extas\interfaces\workflows\entities\IHasEntity;
use extas\interfaces\workflows\states\IHasState;

/**
 * Interface IStateToEntityMap
 *
 * @package extas\interfaces\deflou\states
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IStateToEntityMap extends IItem, IHasId, IHasState, IHasEntity
{
    public const SUBJECT = 'extas.df.state.to.entity.map';
}
