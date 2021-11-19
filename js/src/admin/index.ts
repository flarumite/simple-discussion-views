import app from 'flarum/admin/app';

app.initializers.add('flarumite-simple-discussion-views', () => {
    app.extensionData
        .for('flarumite-simple-discussion-views')
        .registerPermission(
            {
                icon: 'far fa-eye',
                label: app.translator.trans('flarumite-simple-discussion-views.admin.permissions.reset_views_label'),
                permission: 'discussion.resetViews',
            },
            'moderate'
        )
        .registerSetting({
            setting: 'fsdv.ignore-crawlers',
            type: 'boolean',
            label: app.translator.trans('flarumite-simple-discussion-views.admin.settings.ignore_crawlers'),
        });
});
