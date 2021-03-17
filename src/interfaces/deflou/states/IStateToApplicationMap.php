<?php
namespace extas\interfaces\deflou\states;

use extas\interfaces\deflou\applications\IApplication;
use extas\interfaces\IHasId;
use extas\interfaces\IItem;
use extas\interfaces\workflows\states\IHasState;

/**
 * Interface IStateToApplicationMap
 *
 * @package extas\interfaces\deflou\states
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IStateToApplicationMap extends IItem, IHasState, IHasId
{
    public const SUBJECT = 'extas.df.state.to.application.map';

    public const FIELD__APPLICATION_NAME = 'application_name';

    /**
     * @return string
     */
    public function getApplicationName(): string;

    /**
     * @return IApplication|null
     */
    public function getApplication(): ?IApplication;

    /**
     * @param string $name
     * @return IStateToApplicationMap
     */
    public function setApplicationName(string $name): IStateToApplicationMap;
}
