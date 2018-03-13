<?php
namespace LeoGalleguillos\Earning\Model\Entity;

use DateTime;
use LeoGalleguillos\Earning\Model\Entity as EarningEntity;

class Earning
{
    protected $amount;
    protected $entityId;
    protected $entityTypeId;
    protected $typeId;
    protected $userId;
    protected $created;

    public function getAmount() : float
    {
        return $this->amount;
    }

    public function getCreated() : DateTime
    {
        return $this->created;
    }

    public function getEntityId() : int
    {
        return $this->entityId;
    }

    public function getEntityTypeId() : int
    {
        return $this->entityTypeId;
    }

    public function getTypeId() : int
    {
        return $this->typeId;
    }

    public function getUserId() : int
    {
        return $this->userId;
    }

    public function setAmount(float $amount) : EarningEntity\Earning
    {
        $this->amount = $amount;
        return $this;
    }

    public function setCreated(DateTime $created) : EarningEntity\Earning
    {
        $this->created = $created;
        return $this;
    }

    public function setEntityId(int $entityId) : EarningEntity\Earning
    {
        $this->entityId = $entityId;
        return $this;
    }

    public function setEntityTypeId(int $entityTypeId) : EarningEntity\Earning
    {
        $this->entityTypeId = $entityTypeId;
        return $this;
    }

    public function setTypeId(int $typeId) : EarningEntity\Earning
    {
        $this->typeId = $typeId;
        return $this;
    }

    public function setUserId(int $userId) : EarningEntity\Earning
    {
        $this->userId = $userId;
        return $this;
    }
}
