import { extend } from 'flarum/common/extend';
import DiscussionListState from 'flarum/forum/states/DiscussionListState';

export default function () {
  extend(DiscussionListState.prototype, 'sortMap', function (map: any) {
    map.popular = '-view_count';
    map.unpopular = 'view_count';
  });
}
