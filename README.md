# FoF Discussion Views

[![MIT license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/fof/discussion-views/blob/master/LICENSE) [![Latest Stable Version](https://img.shields.io/packagist/v/fof/discussion-views.svg)](https://packagist.org/packages/fof/discussion-views) [![Total Downloads](https://img.shields.io/packagist/dt/fof/discussion-views.svg)](https://packagist.org/packages/fof/discussion-views)

A lightweight discussion view tracker, with minimal settings and options.

## Features

- Tracks how many times a discussion has been viewed and displays it per discussion on the discussionlist. _Note: does not track unique views, rather every view, both as guest and registered member_
- Adds 2 sorting options: popular and unpopular
- Adds 1 event which developers can listen for: `DiscussionWasViewed` - includes accessor IP and UserAgent strings
- Adds 1 new permission where people can (re)set the viewcount of a discussion (default to admins)
- Uses `view_count` column created on the `discussions` table, so should not impact load performance
- Identify known crawlers with an option to not increase the view count for their visit. Uses [jaybizzle/crawler-detect](https://github.com/JayBizzle/Crawler-Detect) for identification

### Installation

```sh
composer require fof/discussion-views:"*"
```

### Links

- [Packagist](https://packagist.org/packages/fof/discussion-views)
- [GitHub](https://github.com/friendsofflarum/discussion-views)
- [Discuss](https://discuss.flarum.org/d/24002)
