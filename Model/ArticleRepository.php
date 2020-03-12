<?php

namespace Boangri\BlogApi\Model;

use Boangri\BlogApi\Api\ArticleRepositoryInterface;
use Boangri\BlogApi\Api\Data\ArticleInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use SY\Blog\Model\ResourceModel\Article;
use SY\Blog\Model\ResourceModel\Article\CollectionFactory;

class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var Article
     */
    private $resourceModel;

    public function __construct(
        CollectionFactory $collectionFactory,
        Article $resourceModel
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Boangri\BlogApi\Api\Data\ArticleSearchResultsInterface|void
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        return $this->collectionFactory->create()->getItems();
    }

    /**
     * @param int $articleId
     * @return ArticleInterface|void
     */
    public function getById(int $articleId)
    {
        $this->resourceModel->load($articleId);
    }

    /**
     * @param int $articleId
     * @return bool|void
     * @throws \Exception
     */
    public function deleteById(int $articleId)
    {
        $this->resourceModel->delete($articleId);
    }

    /**
     * @param ArticleInterface $article
     * @return Article
     * @throws AlreadyExistsException
     */
    public function save(ArticleInterface $article)
    {
        return $this->resourceModel->save($article);
    }
}
