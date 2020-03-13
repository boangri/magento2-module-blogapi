<?php

namespace Boangri\BlogApi\Model;

use Boangri\BlogApi\Api\ArticleRepositoryInterface;
use Boangri\BlogApi\Api\Data\ArticleInterface;
use Boangri\BlogApi\Api\Data\ArticleSearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\NoSuchEntityException;
use Boangri\BlogApi\Model\ArticleFactory;
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
    private $searchResultsFactory;

    public function __construct(
        CollectionFactory $collectionFactory,
        ResourceModel $resourceModel,
        ArticleSearchResultsInterfaceFactory $searchResultsFactory,
        ArticleFactory $articleFactory
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->resourceModel = $resourceModel;
        $this->articleFactory = $articleFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var SearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $collection = $this->collectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?? 'eq';
                $fields[] = $filter->getField();
                $conditions[] = [$condition => $filter->getValue()];
            }
            if ($fields) {
                $collection->addFieldToFilter($fields, $conditions);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $objects = [];
        foreach ($collection as $objectModel) {
            $objects[] = $objectModel;
        }
        $searchResults->setItems($objects);

        return $searchResults;
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
