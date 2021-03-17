<?php
namespace extas\interfaces\deflou\states\samples;

use extas\interfaces\deflou\applications\samples\IApplicationSample;
use extas\interfaces\IHasId;
use extas\interfaces\IItem;
use extas\interfaces\workflows\states\IHasStateSample;

/**
 * Interface IStateSampleToApplicationSampleMap
 *
 * @package extas\interfaces\deflou\states\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IStateSampleToApplicationSampleMap extends IItem, IHasStateSample, IHasId
{
    public const SUBJECT = 'extas.df.state.sample.to.application.sample.map';

    public const FIELD__APPLICATION_SAMPLE_NAME = 'application_sample_name';

    /**
     * @return string
     */
    public function getApplicationSampleName(): string;

    /**
     * @return IApplicationSample|null
     */
    public function getApplicationSample(): ?IApplicationSample;

    /**
     * @param string $name
     * @return $this
     */
    public function setApplicationSampleName(string $name);
}
