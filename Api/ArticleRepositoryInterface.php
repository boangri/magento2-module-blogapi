<?php

namespace Boangri\BlogApi\Api;

use Boangri\BlogApi\Api\Data\ArticleInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use SY\Blog\Model\Article;

interface ArticleRepositoryInterface
{
    /**
     * Retrieve articles matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return ArticleInterface[]
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Retrieve article.
     *
     * @param int $articleId
     * @return ArticleInterface
     * @throws LocalizedException
     */
    public function getById(int $articleId);

    /**
     * Delete article by ID.
     *
     * @param int $articleId
     * @return bool true on success
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById(int $articleId);

    /**
     * Save article.
     *
     * @param Article $article
     * @return ArticleInterface
     * @throws LocalizedException
     */
    public function save(Article $article);
}
