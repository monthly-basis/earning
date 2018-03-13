<?php
namespace LeoGalleguillos\EarningTest\Model\Factory;

use DateTime;
use LeoGalleguillos\Earning\Model\Entity as EarningEntity;
use LeoGalleguillos\Earning\Model\Factory as EarningFactory;
use LeoGalleguillos\Earning\Model\Table as EarningTable;
use PHPUnit\Framework\TestCase;

class EarningTest extends TestCase
{
    protected function setUp()
    {
        $this->earningTableMock = $this->createMock(
            EarningTable\Earning::class
        );
        $this->earningFactory = new EarningFactory\Earning(
            $this->earningTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            EarningFactory\Earning::class,
            $this->earningFactory
        );
    }

    public function testBuildFromArray()
    {
        $array = [
            'user_id'        => 1,
            'entity_id'      => 1,
            'entity_type_id' => 1,
            'type_id'        => 1,
            'amount'         => '0.01',
            'created'        => '2018-03-12 22:12:23',
        ];

        $earningEntity = new EarningEntity\Earning();
        $earningEntity->setAmount($array['amount'])
                      ->setCreated(new DateTime($array['created']))
                      ->setEntityId($array['entity_id'])
                      ->setEntityTypeId($array['entity_type_id'])
                      ->setTypeId($array['type_id'])
                      ->setUserId($array['user_id']);

        $this->assertEquals(
            $earningEntity,
            $this->earningFactory->buildFromArray($array)
        );
    }
}
