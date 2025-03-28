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

use Flarum\Discussion\Event\Saving;

class SaveDiscussionFromModal
{
    public function handle(Saving $event)
    {
        if (isset($event->data['attributes']['views']) && $event->actor->can('resetViews', $event->discussion)) {
            /**
             * @var \Flarum\Discussion\Discussion
             */
            $discussion = $event->discussion;

            $discussion->view_count = $event->data['attributes']['views'];
        }
    }
}
