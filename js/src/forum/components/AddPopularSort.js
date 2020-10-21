import { extend } from 'flarum/extend';
import DiscussionListState from 'flarum/states/DiscussionListState';

export default function () {
    extend(DiscussionListState.prototype, 'sortMap', function (map) {
        map.popular = '-view_count';
        map.unpopular = 'view_count';
    });
}
