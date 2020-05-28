<?php

use Flarum\Api\Event\Serializing;
use Flarum\Api\Event\WillGetData;
use Flarum\Api\Event\WillSerializeData;
use Flarum\Discussion\Event\Saving;
use Flarumite\DiscussionViews\Listeners;
use Illuminate\Contracts\Events\Dispatcher;
use Flarum\Extend;
use Flarum\Extend\Frontend;

return [
    (new Frontend('forum'))
        ->css(__DIR__ . '/resources/less/forum.less')
        ->js(__DIR__. '/js/dist/forum.js'),

    (new Frontend('admin'))
        ->js(__DIR__ . '/js/dist/admin.js'),

    new Extend\Locales(__DIR__ . '/resources/locale'),

    function (Dispatcher $events) {
        $events->listen(Serializing::class, Listeners\AddDiscussionApiAttributes::class);
        $events->listen(WillSerializeData::class, Listeners\AddDiscussionViewHandler::class);
        $events->listen(WillGetData::class, Listeners\AddPopularSort::class);
        $events->listen(Saving::class, Listeners\SaveDiscussionFromModal::class);
    }
]; 
