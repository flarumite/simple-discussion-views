import app from 'flarum/forum/app';
import Modal from 'flarum/common/components/Modal';
import Button from 'flarum/common/components/Button';
import Stream from 'flarum/common/utils/Stream';

export default class ResetDiscussionViewsModal extends Modal {
    oninit(vnode) {
        super.oninit(vnode);

        this.discussion = this.attrs.discussion;
        this.currentViewsCount = this.attrs.discussion.views();
        this.newViewsCount = Stream(this.currentViewsCount);
    }

    content() {
        return (
            <div className="Modal-body">
                <div className="Form Form--centered">
                    <div className="Form-group">
                        <label>{app.translator.trans('flarumite-simple-discussion-views.forum.modal_resetviews.label')}</label>
                        <input className="FormControl" type="number" min="0" bidi={this.newViewsCount} />
                    </div>
                    <div className="Form-group">
                        <Button className="Button Button--primary" type="submit" loading={this.loading}>
                            {app.translator.trans('flarumite-simple-discussion-views.forum.modal_resetviews.submit')}
                        </Button>
                    </div>
                </div>
            </div>
        );
    }

    title() {
        return app.translator.trans('flarumite-simple-discussion-views.forum.modal_resetviews.title');
    }

    className() {
        return 'Modal--small';
    }

    onsubmit(e) {
        e.preventDefault();
        this.loading = true;

        const newViews = parseInt(this.newViewsCount());
        const currentViews = this.currentViewsCount;

        if (newViews >= 0 && newViews !== currentViews) {
            this.attrs.discussion
                .save({ views: newViews })
                .then(() => {
                    m.redraw();
                })
                .catch((reason) => {
                    this.loading = false;
                    console.warn(reason);
                });
        }

        this.hide();
    }
}
