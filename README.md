[![MIT license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/flarumite/simple-discussion-views/blob/master/LICENSE) [![Latest Stable Version](https://img.shields.io/packagist/v/flarumite/simple-discussion-views.svg)](https://packagist.org/packages/flarumite/simple-discussion-views) [![Total Downloads](https://img.shields.io/packagist/dt/flarumite/simple-discussion-views.svg)](https://packagist.org/packages/flarumite/simple-discussion-views) [![Donate](https://www.paypalobjects.com/en_GB/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QCCXU72DC9LB4&source=url)



# Flarumite Simple Discussion Views

This is a maintained fork of [michaelbelgium/flarum-discussion-views](https://github.com/MichaelBelgium/flarum-discussion-views), largely based on the now removed `v0.1.0-beta.8.3` tagged release.

### Why?
One of the Flarum forums I manage, needed a lightweight discussion view tracker, with minimal settings and options. Turn it on and forget about it, so to speak.

### Features
- Tracks how many times a discussion has been viewed and displays it per discussion on the discussionlist. _Note: does not track unique views, rather every view, both as guest and registered member_
- Adds 2 sorting options: popular and unpopular
- Adds 1 event which developers can listen for: `DiscussionWasViewed` - includes accessor IP and UserAgent strings
- Adds 1 new permission where people can (re)set the viewcount of a discussion (default to admins)
- Uses `view_count` column created on the `discussions` table, so should not impact load performance

### To-do
- Identify known crawlers, don't increase the view count for these visits
- Notify discussion author if their discussion is viewed more than {configurable} times

### Installation

```sh
composer require flarumite/simple-discussion-views
```

### Links

- [![Donate](https://www.paypalobjects.com/en_GB/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QCCXU72DC9LB4&source=url)
- [Packagist](https://packagist.org/packages/flarumite/simple-discussion-views)
- [GitHub](https://github.com/flarumite/simple-discussion-views)
- [Discuss](https://discuss.flarum.org/d/24002)
