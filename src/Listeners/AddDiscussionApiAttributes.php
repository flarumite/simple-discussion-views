<?php

/*
 * This file is part of flarumite/flarum-decontaminator.
 *
 * Copyright (c) 2020 Flarumite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flarumite\DiscussionViews\Listeners;

use Flarum\Api\Event\Serializing;
use Flarum\Api\Serializer\DiscussionSerializer;

class AddDiscussionApiAttributes
{
    /**
     * @param Serializing $event
     */
    public function handle(Serializing $event)
    {
        if ($event->isSerializer(DiscussionSerializer::class)) {
            $event->attributes['views'] = $event->model->view_count;

            if ((bool) $event->actor->can('resetViews')) {
                $event->attributes['canReset'] = (bool) $event->actor->can('resetViews');
            }
        }
    }
}
