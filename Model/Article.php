<?php

namespace Boangri\BlogApi\Model;

use Boangri\BlogApi\Api\Data\ArticleInterface;

class Article extends \SY\Blog\Model\Article implements ArticleInterface
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData('id');
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->getData('image');
    }
    /**
     * @return string
     */

    public function getTitle()
    {
        return $this->getData('title');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getData('description');
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->getData('text');
    }

    /**
     * @return string
     */
    public function getUrlKey()
    {
        return $this->getData('url_key');
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData('created_at');
    }

    /**
     * @return bool
     */
    public function getActive()
    {
        return $this->getData('active');
    }

    /**
     * @param int $id
     * @return $this
     */
//    public function setId(int $id)
//    {
//        $this->setdata('id', $id);
//        return $this;
//    }

    /**
     * @param string $image
     * @return $this
     */
    public function setImage(string $image)
    {
        $this->setdata('image', $image);
        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->setdata('title', $title);
        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->setdata('description', $description);
        return $this;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->setdata('text', $text);
        return $this;
    }

    /**
     * @param string $urlKey
     * @return $this
     */
    public function setUrlKey(string $urlKey)
    {
        $this->setdata('url_key', $urlKey);
        return $this;
    }

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt(string $createdAt)
    {
        $this->setdata('created_at', $createdAt);
        return $this;
    }

    /**
     * @param bool $isActive
     * @return $this
     */
    public function setActive(bool $isActive)
    {
        $this->setdata('active', $isActive);
        return $this;
    }
}

