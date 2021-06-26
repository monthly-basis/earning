<?php
namespace LeoGalleguillos\EarningTest\Model\Service\Earnings\User;

use Generator;
use LeoGalleguillos\Earning\Model\Entity as EarningEntity;
use LeoGalleguillos\Earning\Model\Factory as EarningFactory;
use LeoGalleguillos\Earning\Model\Service as EarningService;
use LeoGalleguillos\Earning\Model\Table as EarningTable;
use MonthlyBasis\User\Model\Entity as UserEntity;
use PHPUnit\Framework\TestCase;

class TotalTest extends TestCase
{
    protected function setUp(): void
    {
        $this->earningTableMock = $this->createMock(
            EarningTable\Earning::class
        );
        $this->totalUserEarningsService = new EarningService\Earnings\User\Total(
            $this->earningTableMock
        );
    }

    public function test_getTotal_generatorYieldsZeroRows_totalEarningsAreZero()
    {
        $userEntity = new UserEntity\User();
        $userEntity->setUserId(123);

        $this->earningTableMock->method('selectWhereUserId')->willReturn(
            $this->getEmptyGenerator()
        );

        $this->assertSame(
            0.00,
            $this->totalUserEarningsService->getTotal($userEntity)
        );
    }

    public function test_getTotal_generatorYieldsMultipleRows_totalEarningsAreGreaterThanZero()
    {
        $userEntity = new UserEntity\User();
        $userEntity->setUserId(123);

        $this->earningTableMock->method('selectWhereUserId')->willReturn(
            $this->yieldArrays()
        );
        $this->assertSame(
            1.06,
            $this->totalUserEarningsService->getTotal($userEntity)
        );
    }

    protected function getEmptyGenerator()
    {
        yield from [];
    }

    protected function yieldArrays()
    {
        yield [
            'amount' => '0.01',
        ];
        yield [
            'amount' => '0.02',
        ];
        yield [
            'amount' => '1.03',
        ];
    }
}
