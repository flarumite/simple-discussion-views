<?php

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
