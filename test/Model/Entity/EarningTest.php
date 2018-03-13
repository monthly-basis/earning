<?php
namespace LeoGalleguillos\EarningTest\Model\Entity;

use DateTime;
use LeoGalleguillos\Earning\Model\Entity as EarningEntity;
use PHPUnit\Framework\TestCase;

class EarningTest extends TestCase
{
    protected function setUp()
    {
        $this->earningEntity = new EarningEntity\Earning();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            EarningEntity\Earning::class,
            $this->earningEntity
        );
    }

    public function testGettersAndSetters()
    {
        $userId = 123;
        $this->earningEntity->setUserId($userId);
        $this->assertSame(
            $userId,
            $this->earningEntity->getUserId()
        );

        $created = new DateTime();
        $this->earningEntity->setCreated($created);
        $this->assertSame(
            $created,
            $this->earningEntity->getCreated()
        );
    }
}
