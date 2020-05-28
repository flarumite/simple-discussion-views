<?php

namespace Flarumite\DiscussionViews\Listeners;

use Flarum\Api\Controller\ShowDiscussionController;
use Flarum\Discussion\Discussion;
use Flarum\Api\Event\WillSerializeData;
use Flarumite\DiscussionViews\Events\DiscussionWasViewed;
use Flarumite\DiscussionViews\Helpers;

class AddDiscussionViewHandler
{
    /**
     * @param WillSerializeData $event
     */
    public function handle(WillSerializeData $event)
    {
        if ($event->isController(ShowDiscussionController::class))
        {
            /** @var Discussion $current_discussion */
            $current_discussion = $event->data;
            $current_discussion->view_count++;

            event(new DiscussionWasViewed($event->actor, $current_discussion, Helpers::getIpAddress(), Helpers::getUserAgentString()));
            $current_discussion->save();
        }
    }
}