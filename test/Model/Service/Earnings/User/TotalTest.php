<?php
namespace LeoGalleguillos\EarningTest\Model\Service\Earnings\User;

use Generator;
use LeoGalleguillos\Earning\Model\Entity as EarningEntity;
use LeoGalleguillos\Earning\Model\Factory as EarningFactory;
use LeoGalleguillos\Earning\Model\Service as EarningService;
use LeoGalleguillos\Earning\Model\Table as EarningTable;
use LeoGalleguillos\User\Model\Entity as UserEntity;
use PHPUnit\Framework\TestCase;

class TotalTest extends TestCase
{
    protected function setUp()
    {
        $this->earningTableMock = $this->createMock(
            EarningTable\Earning::class
        );
        $this->totalUserEarningsService = new EarningService\Earnings\User\Total(
            $this->earningTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            EarningService\Earnings\User\Total::class,
            $this->totalUserEarningsService
        );
    }
}
