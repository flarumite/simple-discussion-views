import app from 'flarum/app';
import AddPopularSort from './components/AddPopularSort';
import AddViewsToModelAndDisplay from './components/AddViewsToModelAndDisplay';
import AddModerationControl from './components/AddModerationControl';

app.initializers.add('flarumite-simple-discussion-views', () => {
    AddPopularSort();
    AddViewsToModelAndDisplay();
    AddModerationControl();
});
