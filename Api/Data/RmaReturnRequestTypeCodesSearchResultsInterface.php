<?php

namespace Skuld\OrderReturn\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface RmaReturnRequestTypeCodesSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface[]
     */
    public function getItems();

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
