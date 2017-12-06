<?php
/**
 * Genial Framework (https://genial.tech/php/genial-framework/).
 *
 * @link      https://github.com/Genial-Framework/Genial-Framework for the canonical source repository
 *
 * @copyright Copyright (c) 2017-2017 Genial Technologies USA Inc. (https://genial.tech/)
 * @license   https://genial.tech/license/new-bsd New BSD License
 */

namespace Genial\Session;

/**
 * Manager.
 */
class Manager
{
    /**
     * exist().
     *
     * Check to see if a session is running
     *
     * @return bool Return true if a session exists and false if it does not
     */
    public function exist()
    {
        if (php_sapi_name() !== 'cli') {
            return session_status() === PHP_SESSION_ACTIVE ? true : false;
        }

        return false;
    }
}
