<?php

namespace Boangri\BlogApi\Api\Data;

interface ArticleInterface
{
    public function getTitle();
    public function getDescription();
    public function getText();
}

