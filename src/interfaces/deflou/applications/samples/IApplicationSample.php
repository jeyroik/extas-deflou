<?php
namespace extas\interfaces\deflou\applications\samples;

use extas\interfaces\players\IHasPlayer;
use extas\interfaces\samples\ISample;
use extas\interfaces\tags\IHasTags;

/**
 * Interface IApplicationSample
 *
 * @package extas\interfaces\deflou\applications\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IApplicationSample extends ISample, IHasPlayer, IHasTags
{
    public const DF__SUBJECT = 'extas.df.application.sample';
}
