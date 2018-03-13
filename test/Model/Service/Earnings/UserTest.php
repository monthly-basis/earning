<?php
namespace LeoGalleguillos\EarningTest\Model\Service\Earnings;

use Generator;
use LeoGalleguillos\Earning\Model\Entity as EarningEntity;
use LeoGalleguillos\Earning\Model\Factory as EarningFactory;
use LeoGalleguillos\Earning\Model\Service as EarningService;
use LeoGalleguillos\Earning\Model\Table as EarningTable;
use LeoGalleguillos\User\Model\Entity as UserEntity;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected function setUp()
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
