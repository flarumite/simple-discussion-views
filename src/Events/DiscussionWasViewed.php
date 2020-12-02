<?php

/*
 * This file is part of flarumite/simple-discussion-views.
 *
 * Copyright (c) 2020 Flarumite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flarumite\DiscussionViews\Events;

use Flarum\Discussion\Discussion;
use Flarum\User\User;

class DiscussionWasViewed
{
    /** @var User */
    private $actor;

    /** @var Discussion */
    private $discussion;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * DiscussionWasViewed constructor.
     *
     * @param User       $viewer
     * @param Discussion $discussion
     */
    public function __construct(User $actor, Discussion $discussion, string $ip, string $userAgent)
    {
        $this->actor = $actor;
        $this->discussion = $discussion;
        $this->ip = $ip;
        $this->userAgent = $userAgent;
    }
}
