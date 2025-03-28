import app from 'flarum/admin/app';

app.initializers.add('fof-discussion-views', () => {
  app.extensionData
    .for('fof-discussion-views')
    .registerPermission(
      {
        icon: 'far fa-eye',
        label: app.translator.trans('fof-discussion-views.admin.permissions.reset_views_label'),
        permission: 'discussion.resetViews',
      },
      'moderate'
    )
    .registerSetting({
      setting: 'fsdv.ignore-crawlers',
      type: 'boolean',
      label: app.translator.trans('fof-discussion-views.admin.settings.ignore_crawlers'),
    });
});
