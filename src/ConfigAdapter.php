<?php
/**
 * Genial Framework (https://genial.tech/php/genial-framework/)
 *
 * @link      https://github.com/Genial-Framework/Genial-Framework for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Technologies USA Inc. (https://genial.tech/)
 * @license   https://genial.tech/license/new-bsd New BSD License
 */
namespace Genial\Session;
use Genial\Session\Exception\BadFunctionCallException;
/**
 * ConfigAdapter
 */
class ConfigAdapter {
    /**
     * __invoke()
     *
     * @throws BadFunctionCallException If the env() function is undefined 
     *
     * @return array[] Returns the session configuration array
     */
    public function __invoke() {
        if (!function_exists('env')) {
            throw new BadFunctionCallException(sprintf(
                '"%s" expects "env()" function to be defined.',
                __METHOD__
            ));
        }
        return self::format(env('session'));	
    }
	
}

