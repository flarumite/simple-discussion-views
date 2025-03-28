<?php

/*
 * This file is part of fof/discussion-views.
 *
 * Copyright (c) FriendsOfFlarum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FoF\DiscussionViews\Events;

use DateTime;
use Flarum\Discussion\Discussion;
use Flarum\User\User;

class DiscussionWasViewed
{
    /**
     * @var User
     */
    public $actor;

    /**
     * @var Discussion
     */
    public $discussion;

    /**
     * @var string|null
     */
    public $ip;

    /**
     * @var string|null
     */
    public $userAgent;

    /**
     * @var DateTime
     */
    public $timeStamp;

    /**
     * DiscussionWasViewed constructor.
     *
     * @param User       $actor
     * @param Discussion $discussion
     */
    public function __construct(User $actor, Discussion $discussion, ?string $ip, ?string $userAgent, DateTime $timeStamp)
    {
        $this->actor = $actor;
        $this->discussion = $discussion;
        $this->ip = $ip;
        $this->userAgent = $userAgent;
        $this->timeStamp = $timeStamp;
    }
}
