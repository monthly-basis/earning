<?php
namespace LeoGalleguillos\EarningTest\View\Helper\Earnings\User;

use LeoGalleguillos\User\Model\Entity as UserEntity;
use LeoGalleguillos\Earning\Model\Service as EarningService;
use LeoGalleguillos\Earning\View\Helper as EarningHelper;
use PHPUnit\Framework\TestCase;

class TotalTest extends TestCase
{
    protected function setUp()
    {
        $this->totalUserEarningsServiceMock = $this->createMock(
            EarningService\Earnings\User\Total::class
        );
        $this->totalUserEarningsHelper = new EarningHelper\Earnings\User\Total(
            $this->totalUserEarningsServiceMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            EarningHelper\Earnings\User\Total::class,
            $this->totalUserEarningsHelper
        );
    }
}