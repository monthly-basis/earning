<?php
namespace LeoGalleguillos\Earning\Model\Service\Earnings;

use Generator;
use LeoGalleguillos\Earning\Model\Entity as EarningEntity;
use LeoGalleguillos\Earning\Model\Factory as EarningFactory;
use LeoGalleguillos\Earning\Model\Table as EarningTable;
use MonthlyBasis\User\Model\Entity as UserEntity;

class User
{
    public function __construct(
        EarningFactory\Earning $earningFactory,
        EarningTable\Earning $earningTable
    ) {
        $this->earningFactory = $earningFactory;
        $this->earningTable   = $earningTable;
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
        $generator = $this->earningTable->selectWhereUserId($userEntity->getUserId());
        foreach ($generator as $array) {
            yield $this->earningFactory->buildFromArray($array);
        }
    }
}
