<?php

namespace Flarumite\DiscussionViews;

class Helpers
{
    public static function getIpAddress(): ?string
    {
        // TODO address nested ternary deprecation warning
        return isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    }

    public static function getUserAgentString(): ?string
    {
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            return $_SERVER['HTTP_USER_AGENT'];
        }

        return null;
    }
}