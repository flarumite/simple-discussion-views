import app from 'flarum/forum/app';
import AddPopularSort from './components/AddPopularSort';
import AddViewsToModelAndDisplay from './components/AddViewsToModelAndDisplay';
import AddModerationControl from './components/AddModerationControl';
import Discussion from 'flarum/common/models/Discussion';
import Model from 'flarum/common/Model';

app.initializers.add('flarumite-simple-discussion-views', () => {
Discussion.prototype.canReset = Model.attribute('canReset');

    AddPopularSort();
    AddViewsToModelAndDisplay();
    AddModerationControl();
});
