<?php

namespace Flarumite\DiscussionViews\Search;

use Flarum\Filter\FilterInterface;
use Flarum\Filter\FilterState;
use Flarum\Search\AbstractRegexGambit;
use Flarum\Search\SearchState;
use Flarum\User\User;
use Illuminate\Database\Query\Builder;

class PopularFilterGambit extends AbstractRegexGambit implements FilterInterface
{
    /**
     * {@inheritDoc}
     */
    public function getFilterKey(): string
    {
        return 'popular';
    }

    /**
     * {@inheritDoc}
     */
    public function getGambitPattern()
    {
        return 'is:popular';
    }

    /**
     * {@inheritDoc}
     */
    public function filter(FilterState $filterState, string $filterValue, bool $negate)
    {
        $this->sort($filterState->getQuery(), $filterState->getActor(), $negate);
    }

    protected function sort(Builder $query, User $actor, bool $negate)
    {
        $query->orderBy('view_count', 'desc');
    }

    /**
     * @param SearchState $search
     * @param array       $matches
     * @param $negate
     */
    protected function conditions(SearchState $search, array $matches, $negate)
    {
        $this->sort($search->getQuery(), $search->getActor(), $negate);
    }
}
