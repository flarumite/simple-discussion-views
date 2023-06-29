<?php

namespace Flarumite\DiscussionViews\Provider;

use Flarum\Foundation\AbstractServiceProvider;

class DiscussionViewsProvider extends AbstractServiceProvider
{
    public function register()
    {
        $this->container->extend('flarum.forum.discussions.sortmap', function (array $map) {
            return array_merge($map, [
                'popular' => '-view_count',
                'unpopular' => 'view_count',
            ]);
        });
    }
}
