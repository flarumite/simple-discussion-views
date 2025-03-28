<?php

/*
 * This file is part of fof/discussion-views.
 *
 * Copyright (c) FriendsOfFlarum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FoF\DiscussionViews\Listeners;

use Carbon\Carbon;
use Flarum\Api\Controller\ShowDiscussionController;
use Flarum\Http\RequestUtil;
use Flarum\Settings\SettingsRepositoryInterface;
use FoF\DiscussionViews\Events\DiscussionWasViewed;
use FoF\DiscussionViews\Helpers;
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
     * @var CrawlerDetect
     */
    public $crawler;

    /**
     * Allows disabling the handler ahead of any internal API calls.
     *
     * @var bool
     */
    public static $enabled = true;

    public function __construct(Dispatcher $bus, SettingsRepositoryInterface $settings, CrawlerDetect $crawler)
    {
        $this->bus = $bus;
        $this->settings = $settings;
        $this->crawler = $crawler;
    }

    public function __invoke(ShowDiscussionController $controller, &$data, ServerRequestInterface $request)
    {
        if (static::$enabled === false) {
            return;
        }

        $actor = RequestUtil::getActor($request);

        if ($this->settings->get('fsdv.ignore-crawlers') && $this->isCrawler($request->getHeader('User-Agent'))) {
            return;
        }

        /**
         * @var \Flarum\Discussion\Discussion $current_discussion
         */
        $current_discussion = $data;
        $current_discussion->increment('view_count', 1);

        $this->bus->dispatch(new DiscussionWasViewed($actor, $current_discussion, Helpers::getIpAddress(), Helpers::getUserAgentString(), Carbon::now()));
    }

    private function isCrawler(array $agents): bool
    {
        $detected = false;

        foreach ($agents as $agent) {
            if (empty($agent)) {
                continue;
            }

            if ($this->crawler->isCrawler($agent)) {
                $detected = true;
            }
        }

        return $detected;
    }
}
