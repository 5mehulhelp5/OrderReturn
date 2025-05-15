<?php

namespace Skuld\OrderReturn\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface RmaRequestSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Skuld\OrderReturn\Api\Data\RmaRequestInterface[]
     */
    public function getItems();

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaRequestInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
