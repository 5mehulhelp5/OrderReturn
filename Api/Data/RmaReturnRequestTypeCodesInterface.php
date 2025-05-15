<?php

namespace Skuld\OrderReturn\Api\Data;

interface RmaReturnRequestTypeCodesInterface
{
    public function getId();

    public function getCode(): string;

    public function setCode(string $code): RmaReturnRequestTypeCodesInterface;

    public function getDescription(): string;

    public function setDescription(string $description): RmaReturnRequestTypeCodesInterface;

    public function getDeletedAt(): ?\DateTime;

    public function setDeletedAt(\DateTime $deletedAt): RmaReturnRequestTypeCodesInterface;
}
