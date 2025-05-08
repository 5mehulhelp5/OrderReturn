<?php

namespace Skuld\OrderReturn\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface RmaReasonForReturnCodesSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface[]
     */
    public function getItems();

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface[] $items
     * @return $this
     */
    public function setItems(array $items);

}
