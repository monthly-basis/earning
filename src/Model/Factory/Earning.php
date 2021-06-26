<?php
namespace LeoGalleguillos\Earning\Model\Factory;

use DateTime;
use LeoGalleguillos\Earning\Model\Entity as EarningEntity;
use LeoGalleguillos\Earning\Model\Table as EarningTable;
use MonthlyBasis\Entity\Model\Factory as EntityFactory;

class Earning
{
    public function __construct(
        EarningTable\Earning $earningTable,
        EntityFactory\EntityType $entityTypeFactory
    ) {
        $this->earningTable      = $earningTable;
        $this->entityTypeFactory = $entityTypeFactory;
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
                      ->setEntityTypeId($array['entity_type_id'])
                      ->setTypeId($array['type_id'])
                      ->setUserId($array['user_id']);

        if (isset($array['entity_id'])) {
          $earningEntity->setEntityId($array['entity_id']);
        }

        $entityTypeEntity = $this->entityTypeFactory->buildFromEntityTypeId(
            $array['entity_type_id']
        );
        $earningEntity->setEntityTypeEntity($entityTypeEntity);

        return $earningEntity;
    }
}
