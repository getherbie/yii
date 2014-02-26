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
 * PageController is the controller which renders a Herbie page or blog post.
 */
class PageController extends CController
{

    /**
     * Action Index
     */
    public function actionIndex()
    {
        $request = Yii::app()->request;
        $route = $request->getQuery('r');
        if (is_null($route)) {
            $route = $request->getPathInfo();
        }

        $app = $this->getModule('herbie')->application;
        $path = $app['urlMatcher']->match($route);

        $pageLoader = new Herbie\Loader\PageLoader($app['parser']);
        $page = $app['page'] = $pageLoader->load($path);

        $layout = $page->getLayout();
        if (empty($layout)) {
            $content = $app->renderContentSegment(0);
        } else {
            $content = $app->renderLayout($layout);
        }

		$this->pageTitle = $page->getTitle();

        $this->render('index', array(
            'content' => $content
        ));
    }

}
