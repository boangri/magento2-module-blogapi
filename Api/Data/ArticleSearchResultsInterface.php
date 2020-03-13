<?php

namespace Boangri\BlogApi\Api\Data;

use Boangri\BlogApi\Model\Article;
use Magento\Framework\Api\SearchCriteriaInterface;

interface ArticleSearchResultsInterface
{
    /**
     * Get pages list.
     *
     * @return Article[]
     */
    public function getItems();

    /**
     * @param Article[] $items
     * @return $this
     */
    public function setItems(array $items);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ArticleSearchResultsInterface
     */
    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria);

    /**
     * @param int $totalCount
     * @return $this
     */
    public function setTotalCount($totalCount);

    /**
     * @return SearchCriteriaInterface
     */
    public function getSearchCriteria();

    /**
     * @return int
     */
    public function getTotalCount();
}
