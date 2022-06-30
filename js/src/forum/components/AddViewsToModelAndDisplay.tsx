import { extend } from 'flarum/common/extend';
import Model from 'flarum/common/Model';
import Discussion from 'flarum/common/models/Discussion';
import DiscussionListItem from 'flarum/forum/components/DiscussionListItem';
import abbreviateNumber from 'flarum/common/utils/abbreviateNumber';
import icon from 'flarum/common/helpers/icon';
import type Mithril from 'mithril';
import ItemList from 'flarum/common/utils/ItemList';

export default function () {
  Discussion.prototype.views = Model.attribute('views');

  extend(DiscussionListItem.prototype, 'infoItems', function (items: ItemList<Mithril.Children>) {
    const views = this.attrs.discussion.views();
    items.add('discussion-views', <span>{icon('far fa-eye')} {abbreviateNumber(views)}</span>);
  });
}
