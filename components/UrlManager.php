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
 * UrlManager manages the URLs of the Herbie Yii module.
 */
class UrlManager extends CUrlManager
{

    /**
     * Parses the user request.
     * @param CHttpRequest $request The request application component.
     * @return string The route (controllerID/actionID) and perhaps GET parameters in path format.
     */
    public function parseUrl($request)
    {
        $route = $request->getQuery('r');
        if (is_null($route)) {
            $route = $request->getPathInfo();
        }

        $app = Yii::app()->getModule('herbie')->application;
        try {
            $path = $app['urlMatcher']->match($route);
        } catch (Exception $ex) {
            // Don't catch exception
        }

        if (!empty($path)) {
            return 'herbie/page';
        }

        return parent::parseUrl($request);
    }

}
