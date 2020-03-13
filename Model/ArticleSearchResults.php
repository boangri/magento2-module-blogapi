<?php

namespace Boangri\BlogApi\Model;

use Boangri\BlogApi\Api\Data\ArticleInterface;
use Boangri\BlogApi\Api\Data\ArticleSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

class ArticleSearchResults implements ArticleSearchResultsInterface
{
    /**
     * @var Article[]
     */
    private $items = [];
    /**
     * @var SearchCriteriaInterface
     */
    private $searchCriteria;
    /**
     * @var int
     */
    private $totalCount;

    /**
     * @return Article[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Article[] $items
     * @return $this
     */
    public function setItems(array $items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ArticleSearchResults
     */
    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }

    /**
     * @param int $totalCount
     * @return $this
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
        return $this;
    }

    /**
     * @return SearchCriteriaInterface
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }
}
