import { extend } from 'flarum/common/extend';
import Button from 'flarum/common/components/Button';
import DiscussionControls from 'flarum/common/utils/DiscussionControls';
import ResetDiscussionViewsModal from './ResetDiscussionViewsModal';

export default function () {
    extend(DiscussionControls, 'moderationControls', function (items, discussion) {
        if (discussion.attribute('canReset')) {
            items.add(
                'reset',
                <Button icon="far fa-eye" onclick={() => app.modal.show(ResetDiscussionViewsModal, { discussion })}>
                    {app.translator.trans('flarumite-simple-discussion-views.forum.discussion_controls.resetviews_button')}
                </Button>
            );
        }
    });
}
