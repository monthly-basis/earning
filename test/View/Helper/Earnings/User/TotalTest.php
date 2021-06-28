<?php
namespace MonthlyBasis\EarningTest\View\Helper\Earnings\User;

use MonthlyBasis\User\Model\Entity as UserEntity;
use MonthlyBasis\Earning\Model\Service as EarningService;
use MonthlyBasis\Earning\View\Helper as EarningHelper;
use PHPUnit\Framework\TestCase;

class TotalTest extends TestCase
{
    protected function setUp(): void
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
