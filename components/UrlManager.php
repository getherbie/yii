<?php

/*
 * This file is part of Herbie.
 *
 * (c) Thomas Breuss <www.tebe.ch>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class UrlManager extends CUrlManager
{

    public function parseUrl($request)
    {
        $pathSegments = explode('/', $request->pathInfo);
        $route = $request->getQuery('r');
        if (is_null($route)) {
            $route = $request->getPathInfo();
        }

        $app = new Herbie\Application('../protected/herbie');
        try {
            $path = $app['urlMatcher']->match($route);
        } catch (Exception $ex) {

        }
        if (!empty($path)) {
            return 'herbie/page';
        }

        return parent::parseUrl($request);
    }

}
