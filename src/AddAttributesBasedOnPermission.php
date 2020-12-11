<?php

/*
 * This file is part of flarumite/simple-discussion-views.
 *
 * Copyright (c) 2020 Flarumite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flarumite\DiscussionViews;

use Flarum\Api\Serializer\DiscussionSerializer;
use Flarum\Discussion\Discussion;

class AddAttributesBasedOnPermission
{
    public function __invoke(DiscussionSerializer $serializer, Discussion $discussion, array $attributes): array
    {
        if ($value = (bool) $serializer->getActor()->can('resetViews')) {
            $attributes['canReset'] = $value;
        }

        return $attributes;
    }
}
