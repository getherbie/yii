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
 * Twigify parses a portion of twig code into HTML.
 *
 * All twig code is parsed in the context of Herbie. This means that we can
 * use specified Herbie functions, filters and tests.
 *
 * To use this widget in a view, use the following:
 * <pre>
 * $this->beginWidget('path.to.Twigify');
 * // ... display twig content here
 * $this->endWidget();
 * </pre>
 */
class Twigify extends CWidget
{

    /**
     * Init
     */
    public function init()
    {
        ob_start();
        ob_implicit_flush(false);
    }

    /**
     * Run
     */
    public function run()
    {
        $string = ob_get_clean();
        $app = Yii::app()->getModule('herbie')->application;
        echo $app->renderString($string);
    }

}