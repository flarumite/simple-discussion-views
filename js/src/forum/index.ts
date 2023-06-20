import app from 'flarum/forum/app';
import AddPopularSort from './components/AddPopularSort';
import AddViewsToModelAndDisplay from './components/AddViewsToModelAndDisplay';
import AddModerationControl from './components/AddModerationControl';

export { default as extend } from './extend';

app.initializers.add('flarumite-simple-discussion-views', () => {
  AddPopularSort();
  AddViewsToModelAndDisplay();
  AddModerationControl();
});
