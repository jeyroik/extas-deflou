<?php
namespace extas\components\deflou\applications\samples;

use extas\components\players\THasPlayer;
use extas\components\samples\Sample;
use extas\components\tags\THasTags;
use extas\interfaces\deflou\applications\samples\IApplicationSample;

/**
 * Class ApplicationSample
 *
 * @package extas\components\deflou\applications\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
class ApplicationSample extends Sample implements IApplicationSample
{
    use THasPlayer;
    use THasTags;

    /**
     * @return string
     */
    public function getTagTargetId(): string
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getTagTargetCategory(): string
    {
        return $this->getSubjectForExtension();
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::DF__SUBJECT;
    }
}
