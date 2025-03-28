<?php

/*
 * This file is part of fof/discussion-views.
 *
 * Copyright (c) FriendsOfFlarum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FoF\DiscussionViews;

use Flarum\Api\Controller;
use Flarum\Api\Serializer\DiscussionSerializer;
use Flarum\Discussion\Discussion;
use Flarum\Discussion\Event\Saving;
use Flarum\Discussion\Filter\DiscussionFilterer;
use Flarum\Discussion\Search\DiscussionSearcher;
use Flarum\Extend;

return [
    (new Extend\Frontend('forum'))
        ->css(__DIR__.'/resources/less/forum.less')
        ->js(__DIR__.'/js/dist/forum.js'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    new Extend\Locales(__DIR__.'/resources/locale'),

    (new Extend\Model(Discussion::class))
        ->cast('view_count', 'int'),

    (new Extend\Event())
        ->listen(Saving::class, Listeners\SaveDiscussionFromModal::class),

    (new Extend\ApiSerializer(DiscussionSerializer::class))
        ->attribute('views', function (DiscussionSerializer $serializer, Discussion $discussion) {
            return $discussion->view_count;
        })
        ->attributes(AddAttributesBasedOnPermission::class),

    (new Extend\ApiController(Controller\ShowDiscussionController::class))
        ->prepareDataForSerialization(Listeners\AddDiscussionViewHandler::class),

    (new Extend\ApiController(Controller\ListDiscussionsController::class))
        ->addSortField('view_count'),

    (new Extend\Settings())
        ->default('fsdv.ignore-crawlers', true),

    (new Extend\ServiceProvider())
        ->register(Provider\DiscussionViewsProvider::class),

    (new Extend\SimpleFlarumSearch(DiscussionSearcher::class))
        ->addGambit(Search\PopularFilterGambit::class),

    (new Extend\Filter(DiscussionFilterer::class))
        ->addFilter(Search\PopularFilterGambit::class),
];
