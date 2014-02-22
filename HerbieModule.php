<?php

/*
 * This file is part of Herbie.
 *
 * (c) Thomas Breuss <www.tebe.ch>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class HerbieModule extends CWebModule
{

    public $site;

    public function init()
    {
        $this->setImport(array(
            'herbie.components.*',
        ));
    }

}
