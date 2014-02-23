<?php

/*
 * This file is part of Herbie.
 *
 * (c) Thomas Breuss <www.tebe.ch>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * HerbieModule is a wrapper for Herbie a flat file CMS & Blog system.
 */
class HerbieModule extends CWebModule
{

    /**
     * @var string The path to the Herbie site.
     */
    public $sitePath;

    /**
     * Initializer
     */
    public function init()
    {
        $this->setImport(array(
            'herbie.components.*',
        ));
    }

}
