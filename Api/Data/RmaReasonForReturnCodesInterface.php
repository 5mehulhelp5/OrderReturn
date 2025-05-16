<?php

namespace Skuld\OrderReturn\Api\Data;

interface RmaReasonForReturnCodesInterface
{
    public function getId();

    public function getCode(): string;

    public function setCode(string $code): RmaReasonForReturnCodesInterface;

    public function getDescription(): string;

    public function setDescription(string $description): RmaReasonForReturnCodesInterface;

    public function getDeletedAt(): ?\DateTime;

    public function setDeletedAt(\DateTime $deletedAt): RmaReasonForReturnCodesInterface;

    public function getIsDeleted(): bool;
}
