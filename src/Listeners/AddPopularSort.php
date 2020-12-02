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

use Flarum\Api\Event\WillGetData;

class AddPopularSort
{
    /**
     * @param WillGetData $event
     */
    public function handle(WillGetData $event)
    {
        $event->addSortField('view_count');
    }
}
