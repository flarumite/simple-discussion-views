<?php

/*
 * This file is part of flarumite/simple-discussion-views.
 *
 * Copyright (c) 2020 Flarumite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flarumite\DiscussionViews\Listeners;

use Carbon\Carbon;
use Flarum\Api\Controller\ShowDiscussionController;
use Flarum\Http\RequestUtil;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarumite\DiscussionViews\Events\DiscussionWasViewed;
use Flarumite\DiscussionViews\Helpers;
use Illuminate\Contracts\Events\Dispatcher;
use Jaybizzle\CrawlerDetect\CrawlerDetect;
use Psr\Http\Message\ServerRequestInterface;

class AddDiscussionViewHandler
{
    /**
     * @var Dispatcher
     */
    public $bus;

    /**
     * @var SettingsRepositoryInterface
     */
    public $settings;
    /**
     * @var bool
     * @info Disables tracking, can be toggled before sending internal requests for instance.
     */
    public static $disable = false;

    public function __construct(Dispatcher $bus, SettingsRepositoryInterface $settings)
    {
        $this->bus = $bus;
        $this->settings = $settings;
    }

    public function __invoke(ShowDiscussionController $controller, &$data, ServerRequestInterface $request)
    {
        if (static::$disable === true) return;

        /**
         * @var \Flarum\User\User
         */
        $actor = RequestUtil::getActor($request);

        if ($this->settings->get('fsdv.ignore-crawlers') && $this->isCrawler($request->getHeader('User-Agent'))) {
            return;
        }

        /**
         * @var \Flarum\Discussion\Discussion $current_discussion
         */
        $current_discussion = $data;
        $current_discussion->view_count++;
        $current_discussion->save();

        $this->bus->dispatch(new DiscussionWasViewed($actor, $current_discussion, Helpers::getIpAddress(), Helpers::getUserAgentString(), Carbon::now()));
    }

    private function isCrawler(array $agents): bool
    {
        $detected = false;
        $crawler = new CrawlerDetect();

        foreach ($agents as $agent) {
            if (empty($agent)) {
                continue;
            }

            if ($crawler->isCrawler($agent)) {
                $detected = true;
            }
        }

        return $detected;
    }
}
