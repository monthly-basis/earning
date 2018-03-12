<?php
namespace LeoGalleguillos\Earning\Model\Service\Earnings;

use Generator;
use LeoGalleguillos\Earning\Model\Entity as EarningEntity;
use LeoGalleguillos\Earning\Model\Table as EarningTable;
use LeoGalleguillos\User\Model\Entity as UserEntity;

class User
{
    public function __construct(
        EarningTable\Earning $earningTable
    ) {
        $this->earningTable = $earningTable;
    }

    /**
     * Get earnings.
     *
     * @param UserEntity\User $userEntity
     * @yield EarningEntity\Earning
     * @return Generator
     */
    public function getEarnings(UserEntity\User $userEntity) : Generator
    {
        yield null;
    }
}
