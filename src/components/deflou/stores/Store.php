<?php
namespace extas\components\deflou\stores;

use extas\components\Item;
use extas\components\players\THasPlayer;
use extas\components\THasDescription;
use extas\components\THasEndpoint;
use extas\components\THasName;
use extas\interfaces\deflou\stores\IStore;

/**
 * Class Store
 *
 * @package extas\components\deflou\stores
 * @author jeyroik <jeyroik@gmail.com>
 */
class Store extends Item implements IStore
{
    use THasName;
    use THasDescription;
    use THasPlayer;
    use THasEndpoint;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
