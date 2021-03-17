<?php
namespace extas\components\deflou\states\samples;

use extas\components\Item;
use extas\components\THasId;
use extas\components\workflows\states\THasStateSample;
use extas\interfaces\deflou\applications\samples\IApplicationSample;
use extas\interfaces\deflou\states\samples\IStateSampleToApplicationSampleMap;
use extas\interfaces\repositories\IRepository;

/**
 * Class StateSampleToApplicationSampleMap
 *
 * @method IRepository dfApplicationsSamples()
 *
 * @package extas\components\deflou\states\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
class StateSampleToApplicationSampleMap extends Item implements IStateSampleToApplicationSampleMap
{
    use THasStateSample;
    use THasId;

    /**
     * @return string
     */
    public function getApplicationSampleName(): string
    {
        return $this->config[static::FIELD__APPLICATION_SAMPLE_NAME] ?? '';
    }

    /**
     * @return IApplicationSample|null
     */
    public function getApplicationSample(): ?IApplicationSample
    {
        return $this->dfApplicationsSamples()->one([
            IApplicationSample::FIELD__NAME => $this->getApplicationSampleName()
        ]);
    }

    /**
     * @param string $name
     * @return $this|StateSampleToApplicationSampleMap
     */
    public function setApplicationSampleName(string $name)
    {
        $this->config[static::FIELD__APPLICATION_SAMPLE_NAME] = $name;

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
