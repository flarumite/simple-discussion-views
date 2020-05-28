<?php

namespace Flarumite\DiscussionViews\Listeners;

use Flarum\Api\Serializer\DiscussionSerializer;
use Flarum\Api\Event\Serializing;

class AddDiscussionApiAttributes
{
    /**
     * @param Serializing $event
     */
    public function handle(Serializing $event)
    {
        if ($event->isSerializer(DiscussionSerializer::class))
        {
            $event->attributes['views'] = $event->model->view_count;

            if ((bool)$event->actor->can('resetViews')) {
                $event->attributes['canReset'] = (bool)$event->actor->can('resetViews');
            }
        }
    }
}
