<?php

namespace Boangri\BlogApi\Model;

use Boangri\BlogApi\Api\ArticleRepositoryInterface;
use Boangri\BlogApi\Api\Data\ArticleInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\NoSuchEntityException;
use SY\Blog\Model\Article;
use SY\Blog\Model\ArticleFactory;
use SY\Blog\Model\ResourceModel\Article as ResourceModel;
use SY\Blog\Model\ResourceModel\Article\CollectionFactory;

class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;
    /**
     * @var ResourceModel
     */
    private $resourceModel;
    /**
     * @var ArticleFactory
     */
    private $articleFactory;

    public function __construct(
        CollectionFactory $collectionFactory,
        ResourceModel $resourceModel,
        ArticleFactory $articleFactory
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->resourceModel = $resourceModel;
        $this->articleFactory = $articleFactory;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return DataObject[]
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        return $this->collectionFactory->create()->getItems();
    }

    /**
     * @param int $articleId
     * @return Article
     * @throws NoSuchEntityException
     */
    public function getById(int $articleId)
    {
        $article = $this->articleFactory->create();
        $article->load($articleId);
        if (!$article->getId()) {
            throw new NoSuchEntityException(__('The Article with the "%1" ID doesn\'t exist.', $articleId));
        }

        return $article;
    }

    /**
     * @param int $articleId
     * @return bool|void
     * @throws \Exception
     */
    public function deleteById(int $articleId)
    {
        $this->resourceModel->delete($this->getById($articleId));
    }

    /**
     * @param ArticleInterface $article
     * @return ResourceModel
     * @throws AlreadyExistsException
     */
    public function save(ArticleInterface $article)
    {
        return $this->resourceModel->save($article);
    }
}
