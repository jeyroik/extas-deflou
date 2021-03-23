<?php
namespace extas\interfaces\deflou\stores;

use extas\interfaces\IHasDescription;
use extas\interfaces\IHasEndpoint;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;
use extas\interfaces\players\IHasPlayer;

/**
 * Interface IStore
 *
 * @package extas\interfaces\deflou\stores
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IStore extends IItem, IHasName, IHasDescription, IHasPlayer, IHasEndpoint
{
    public const SUBJECT = 'extas.df.store';
}
