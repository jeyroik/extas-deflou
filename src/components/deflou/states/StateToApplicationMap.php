<?php
namespace extas\components\deflou\states;

use extas\components\Item;
use extas\components\THasId;
use extas\components\workflows\states\THasState;
use extas\interfaces\deflou\applications\IApplication;
use extas\interfaces\deflou\states\IStateToApplicationMap;
use extas\interfaces\repositories\IRepository;

/**
 * Class StateToApplicationMap
 *
 * @method IRepository dfApplications()
 *
 * @package extas\components\deflou\states
 * @author jeyroik <jeyroik@gmail.com>
 */
class StateToApplicationMap extends Item implements IStateToApplicationMap
{
    use THasState;
    use THasId;

    /**
     * @return string
     */
    public function getApplicationName(): string
    {
        return $this->config[static::FIELD__APPLICATION_NAME] ?? '';
    }

    /**
     * @return IApplication|null
     */
    public function getApplication(): ?IApplication
    {
        return $this->dfApplications()->one([
            IApplication::FIELD__NAME => $this->getApplicationName()
        ]);
    }

    /**
     * @param string $name
     * @return IStateToApplicationMap
     */
    public function setApplicationName(string $name): IStateToApplicationMap
    {
        $this->config[static::FIELD__APPLICATION_NAME] = $name;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
