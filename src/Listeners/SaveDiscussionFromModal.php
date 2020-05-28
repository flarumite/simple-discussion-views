<?php
namespace Flarumite\DiscussionViews\Listeners;

use Flarum\Discussion\Event\Saving;

class SaveDiscussionFromModal
{
	public function handle(Saving $event)
	{
		if(isset($event->data["attributes"]["views"]))
		{
			$discussion = $event->discussion;

			$discussion->view_count = $event->data["attributes"]["views"];
			$discussion->save();
		}
	}
}
