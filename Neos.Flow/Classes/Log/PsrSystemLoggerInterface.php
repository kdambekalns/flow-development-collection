<?php
namespace Neos\Flow\Log;

/*
 * This file is part of the Neos.Flow package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

/**
 * Marker interface for the system logger.
 * Convenience interface replacing the SystemLoggerInterface
 *
 * @see SystemLoggerInterface
 */
interface PsrSystemLoggerInterface extends \Psr\Log\LoggerInterface
{
}
