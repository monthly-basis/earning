<?php
namespace MonthlyBasis\Earning\Model\Service\Earnings\User;

use MonthlyBasis\Earning\Model\Table as EarningTable;
use MonthlyBasis\User\Model\Entity as UserEntity;

class Total
{
    public function __construct(
        EarningTable\Earning $earningTable
    ) {
        $this->earningTable   = $earningTable;
    }

    /**
     * Get earnings.
     *
     * @param UserEntity\User $userEntity
     * @return float
     */
    public function getTotal(UserEntity\User $userEntity) : float
    {
        $total     = 0.00;
        $generator = $this->earningTable->selectWhereUserId($userEntity->getUserId());

        foreach ($generator as $array) {
            $total += $array['amount'];
        }

        return $total;
    }
}
