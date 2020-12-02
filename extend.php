<?php

/*
 * This file is part of flarumite/simple-discussion-views.
 *
 * Copyright (c) 2020 Flarumite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Flarum\Api\Event\Serializing;
use Flarum\Api\Event\WillGetData;
use Flarum\Api\Event\WillSerializeData;
use Flarum\Discussion\Event\Saving;
use Flarum\Extend;
use Flarum\Extend\Frontend;
use Flarumite\DiscussionViews\Listeners;

return [
    (new Frontend('forum'))
        ->css(__DIR__.'/resources/less/forum.less')
        ->js(__DIR__.'/js/dist/forum.js'),

    (new Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    new Extend\Locales(__DIR__.'/resources/locale'),

    (new Extend\Event())
        ->listen(Serializing::class, Listeners\AddDiscussionApiAttributes::class)
        ->listen(WillSerializeData::class, Listeners\AddDiscussionViewHandler::class)
        ->listen(WillGetData::class, Listeners\AddPopularSort::class)
        ->listen(Saving::class, Listeners\SaveDiscussionFromModal::class),
];
