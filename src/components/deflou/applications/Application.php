<?php
namespace extas\components\deflou\applications;

use extas\components\deflou\applications\samples\ApplicationSample;
use extas\components\samples\THasSample;
use extas\interfaces\deflou\applications\IApplication;

/**
 * Class Application
 *
 * @package extas\components\deflou\applications
 * @author jeyroik <jeyroik@gmail.com>
 */
class Application extends ApplicationSample implements IApplication
{
    use THasSample;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'extas.df.application';
    }
}
