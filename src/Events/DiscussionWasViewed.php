<?php

namespace Flarumite\DiscussionViews\Events;


use Flarum\Discussion\Discussion;
use Flarum\User\User;

class DiscussionWasViewed
{
    /** @var User $actor */
    private $actor;

    /** @var Discussion $discussion */
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
     * @param User $viewer
     * @param Discussion $discussion
     */
    public function __construct(User $actor, Discussion $discussion, String $ip, String $userAgent)
    {
        $this->actor = $actor;
        $this->discussion = $discussion;
        $this->ip = $ip;
        $this->userAgent = $userAgent;
    }
}