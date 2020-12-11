<?php

/*
 * This file is part of flarumite/simple-discussion-views.
 *
 * Copyright (c) 2020 Flarumite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Flarum\Api\Controller\ListDiscussionsController;
use Flarum\Api\Controller\ShowDiscussionController;
use Flarum\Api\Serializer\DiscussionSerializer;
use Flarum\Database\AbstractModel;
use Flarum\Discussion\Event\Saving;
use Flarum\Extend;
use Flarum\Extend\Frontend;
use Flarumite\DiscussionViews\AddAttributesBasedOnPermission;
use Flarumite\DiscussionViews\Listeners;
use Flarumite\DiscussionViews\Listeners\AddDiscussionViewHandler;

return [
    (new Frontend('forum'))
        ->css(__DIR__.'/resources/less/forum.less')
        ->js(__DIR__.'/js/dist/forum.js'),

    (new Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    new Extend\Locales(__DIR__.'/resources/locale'),

    (new Extend\Event())
        ->listen(Saving::class, Listeners\SaveDiscussionFromModal::class),

    (new Extend\ApiSerializer(DiscussionSerializer::class))
        ->attribute('views', function (DiscussionSerializer $serializer, AbstractModel $discussion) {
            return $discussion->view_count;
        })
        ->mutate(AddAttributesBasedOnPermission::class),

    (new Extend\ApiController(ShowDiscussionController::class))
        ->prepareDataForSerialization(AddDiscussionViewHandler::class),

    (new Extend\ApiController(ListDiscussionsController::class))
        ->addSortField('view_count'),
];
