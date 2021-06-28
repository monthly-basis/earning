<?php
namespace MonthlyBasis\Earning\Model\Service\Earnings;

use Generator;
use MonthlyBasis\Earning\Model\Entity as EarningEntity;
use MonthlyBasis\Earning\Model\Factory as EarningFactory;
use MonthlyBasis\Earning\Model\Table as EarningTable;
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
