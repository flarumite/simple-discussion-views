import { extend } from 'flarum/common/extend';
import Model from 'flarum/common/Model';
import Discussion from 'flarum/common/models/Discussion';
import DiscussionListItem from 'flarum/common/components/DiscussionListItem';
import abbreviateNumber from 'flarum/common/utils/abbreviateNumber';

export default function () {
    Discussion.prototype.views = Model.attribute('views');
    Discussion.prototype.canReset = Model.attribute('canReset');

    extend(DiscussionListItem.prototype, 'infoItems', function (items) {
        const views = this.attrs.discussion.views();
        items.add('discussion-views', <span>{abbreviateNumber(views)}</span>);
    });
}
