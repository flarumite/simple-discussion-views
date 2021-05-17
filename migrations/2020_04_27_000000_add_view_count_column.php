
<?php

use Flarum\Database\Migration;

return Migration::addColumns('discussions', [
    'view_count' => [
        'integer',
        'null'     => false,
        'default'  => 0,
        'unsigned' => true,
    ],
]);
