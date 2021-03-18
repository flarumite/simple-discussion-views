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

use Flarum\Api\Controller\ShowDiscussionController;
use Flarumite\DiscussionViews\Events\DiscussionWasViewed;
use Flarumite\DiscussionViews\Helpers;
use Illuminate\Contracts\Events\Dispatcher;
use Psr\Http\Message\ServerRequestInterface;

class AddDiscussionViewHandler
{
    /**
     * @var Dispatcher
     */
    public $bus;

    public function __construct(Dispatcher $bus)
    {
        $this->bus = $bus;
    }
    
    public function __invoke(ShowDiscussionController $controller, &$data, ServerRequestInterface $request)
    {
        /**
         * @var \Flarum\User\User
         */
        $actor = $request->getAttribute('actor');

        /**
         * @var \Flarum\Discussion\Discussion $current_discussion
         */
        $current_discussion = $data;
        $current_discussion->view_count++;
        $current_discussion->save();

        $this->bus->dispatch(new DiscussionWasViewed($actor, $current_discussion, Helpers::getIpAddress(), Helpers::getUserAgentString()));
    }
}
