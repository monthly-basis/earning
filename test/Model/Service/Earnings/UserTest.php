<?php
namespace MonthlyBasis\EarningTest\Model\Service\Earnings;

use Generator;
use MonthlyBasis\Earning\Model\Entity as EarningEntity;
use MonthlyBasis\Earning\Model\Factory as EarningFactory;
use MonthlyBasis\Earning\Model\Service as EarningService;
use MonthlyBasis\Earning\Model\Table as EarningTable;
use MonthlyBasis\User\Model\Entity as UserEntity;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected function setUp(): void
    {
        $this->earningFactoryMock = $this->createMock(
            EarningFactory\Earning::class
        );
        $this->earningTableMock = $this->createMock(
            EarningTable\Earning::class
        );
        $this->userEarningsService = new EarningService\Earnings\User(
            $this->earningFactoryMock,
            $this->earningTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            EarningService\Earnings\User::class,
            $this->userEarningsService
        );
    }

    public function testGetEarnings()
    {
        $userEntity = new UserEntity\User();
        $userEntity->setUserId(123);
        $this->earningTableMock->method('selectWhereUserId')->willReturn(
            $this->yieldArrays()
        );

        $generator = $this->userEarningsService->getEarnings(
            $userEntity
        );
        $this->assertInstanceOf(
            Generator::class,
            $generator
        );
    }

    protected function yieldArrays()
    {
        yield [];
        yield [];
    }
}
