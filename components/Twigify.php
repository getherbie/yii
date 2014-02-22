<?php

/*
 * This file is part of Herbie.
 *
 * (c) Thomas Breuss <www.tebe.ch>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Twigify extends CWidget
{

    public function init()
    {
        ob_start();
        ob_implicit_flush(false);
    }

    public function run()
    {
        $string = ob_get_clean();
        $sitePath = Yii::app()->getModule('herbie')->sitePath;
        $app = new Herbie\Application($sitePath);
        echo $app->renderString($string);
    }

}