<?php

/*
 * This file is part of fof/discussion-views.
 *
 * Copyright (c) FriendsOfFlarum
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        if (!$schema->hasColumn('discussions', 'view_count')) {
            $schema->table('discussions', function (Blueprint $table) {
                $table->integer('view_count')->default(0)->unsigned();
            });
        }
    },
    'down' => function (Builder $schema) {
        // no.
    },
];
