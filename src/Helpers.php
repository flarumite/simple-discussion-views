<?php

/*
 * This file is part of flarumite/flarum-decontaminator.
 *
 * Copyright (c) 2020 Flarumite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
