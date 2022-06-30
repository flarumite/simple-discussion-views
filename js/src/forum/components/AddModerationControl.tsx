import app from 'flarum/forum/app';
import { extend } from 'flarum/common/extend';
import Button from 'flarum/common/components/Button';
import DiscussionControls from 'flarum/forum/utils/DiscussionControls';
import ResetDiscussionViewsModal from './ResetDiscussionViewsModal';
import ItemList from 'flarum/common/utils/ItemList';
import Discussion from 'flarum/common/models/Discussion';
import type Mithril from 'mithril';

export default function () {
  extend(DiscussionControls, 'moderationControls', function (items: ItemList<Mithril.Children>, discussion: Discussion) {
    if (discussion.canReset()) {
      items.add(
        'reset',
        <Button icon="far fa-eye" onclick={() => app.modal.show(ResetDiscussionViewsModal, { discussion })}>
          {app.translator.trans('flarumite-simple-discussion-views.forum.discussion_controls.resetviews_button')}
        </Button>,
        -10
      );
    }
  });
}
