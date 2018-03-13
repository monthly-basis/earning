<?php
namespace LeoGalleguillos\Earning\View\Helper\Earnings\User;

use LeoGalleguillos\User\Model\Entity as UserEntity;
use LeoGalleguillos\Earning\Model\Service as EarningService;
use Zend\View\Helper\AbstractHelper;

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
