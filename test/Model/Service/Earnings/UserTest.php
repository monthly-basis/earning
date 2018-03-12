<?php
namespace LeoGalleguillos\EarningTest\Model\Service\Earnings;

use Generator;
use LeoGalleguillos\Earning\Model\Entity as EarningEntity;
use LeoGalleguillos\Earning\Model\Service as EarningService;
use LeoGalleguillos\Earning\Model\Table as EarningTable;
use LeoGalleguillos\User\Model\Entity as UserEntity;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected function setUp()
    {
        $this->earningTableMock = $this->createMock(
            EarningTable\Earning::class
        );
        $this->userService = new EarningService\Earnings\User(
            $this->earningTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            EarningService\Earnings\User::class,
            $this->userService
        );
    }
}
