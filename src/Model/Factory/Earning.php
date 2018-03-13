<?php
namespace LeoGalleguillos\Earning\Model\Factory;

use DateTime;
use LeoGalleguillos\Earning\Model\Entity as EarningEntity;
use LeoGalleguillos\Earning\Model\Table as EarningTable;

class Earning
{
    public function __construct(
        EarningTable\Earning $earningTable
    ) {
        $this->earningTable = $earningTable;
    }

    /**
     * Build from array.
     *
     * @param array $array
     * @return EarningEntity\Earning
     */
    public function buildFromArray(array $array) : EarningEntity\Earning
    {
        $earningEntity = new EarningEntity\Earning();
        $earningEntity->setAmount($array['amount'])
                      ->setCreated(new DateTime($array['created']))
                      ->setEntityId($array['entity_id'])
                      ->setEntityTypeId($array['entity_type_id'])
                      ->setTypeId($array['type_id'])
                      ->setUserId($array['user_id']);

        return $earningEntity;
    }
}
