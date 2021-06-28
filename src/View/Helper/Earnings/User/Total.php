<?php
namespace MonthlyBasis\Earning\View\Helper\Earnings\User;

use MonthlyBasis\User\Model\Entity as UserEntity;
use MonthlyBasis\Earning\Model\Service as EarningService;
use Laminas\View\Helper\AbstractHelper;

class Total extends AbstractHelper
{
    public function __construct(
        EarningService\Earnings\User\Total $totalUserEarningsService
    ) {
        $this->totalUserEarningsService = $totalUserEarningsService;
    }

    public function __invoke(UserEntity\User $userEntity) : float
    {
        return $this->totalUserEarningsService->getTotal($userEntity);
    }
}
