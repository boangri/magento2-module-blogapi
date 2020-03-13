<?php

namespace Boangri\BlogApi\Api\Data;

interface ArticleInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getImage();
    /**
     * @return string
     */

    public function getTitle();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getText();

    /**
     * @return string
     */
    public function getUrlKey();

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @return bool
     */
    public function getActive();

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id);

    /**
     * @param string $image
     * @return $this
     */
    public function setImage(string $image);

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title);

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description);

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text);

    /**
     * @param string $urlKey
     * @return $this
     */
    public function setUrlKey(string $urlKey);

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt(string $createdAt);

    /**
     * @param bool $isActive
     * @return $this
     */
    public function setActive(bool $isActive);
}

