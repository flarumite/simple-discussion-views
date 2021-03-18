import { extend } from 'flarum/common/extend';
import DiscussionListState from 'flarum/common/states/DiscussionListState';

export default function () {
    extend(DiscussionListState.prototype, 'sortMap', function (map) {
        map.popular = '-view_count';
        map.unpopular = 'view_count';
    });
}
