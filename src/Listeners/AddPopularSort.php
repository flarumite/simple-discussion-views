<?php
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