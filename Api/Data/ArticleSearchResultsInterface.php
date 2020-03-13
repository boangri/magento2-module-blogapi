<?php


namespace Boangri\BlogApi\Api\Data;


use Magento\Framework\Api\SearchResultsInterface;

interface ArticleSearchResultsInterface
{
    /**
     * Get pages list.
     *
     * @return ArticleInterface[]
     */
    public function getItems();
}
