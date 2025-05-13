<?php

namespace Skuld\OrderReturn\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface RmaRequestItemsSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface[]
     */
    public function getItems();

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
