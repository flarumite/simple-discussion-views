import app from 'flarum/common/app';

app.initializers.add('flarumite-simple-discussion-views', () => {
    app.extensionData.for('flarumite-simple-discussion-views').registerPermission(
        {
            icon: 'far fa-eye',
            label: app.translator.trans('flarumite-simple-discussion-views.admin.permissions.reset_views_label'),
            permission: 'discussion.resetViews',
        },
        'moderate'
    );
});
