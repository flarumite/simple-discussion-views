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

use Flarum\Discussion\Event\Saving;

class SaveDiscussionFromModal
{
    public function handle(Saving $event)
    {
        if (isset($event->data['attributes']['views'])) {
            /**
             * @var \Flarum\Discussion\Discussion
             */
            $discussion = $event->discussion;

            $discussion->view_count = $event->data['attributes']['views'];
            $discussion->save();
        }
    }
}
