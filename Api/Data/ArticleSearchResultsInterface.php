<?php


namespace Boangri\BlogApi\Api\Data;


interface ArticleSearchResultsInterface
{
    /**
     * Get pages list.
     *
     * @return \Boangri\BlogApi\Api\Data\ArticleInterface[]
     */
    public function getItems();
}
