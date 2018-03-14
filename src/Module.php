<?php
namespace LeoGalleguillos\Earning;

use LeoGalleguillos\Earning\Model\Factory as EarningFactory;
use LeoGalleguillos\Earning\Model\Service as EarningService;
use LeoGalleguillos\Earning\Model\Table as EarningTable;
use LeoGalleguillos\Earning\View\Helper as EarningHelper;
use LeoGalleguillos\Entity\Model\Factory as EntityFactory;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                    'getTotalUserEarnings' => EarningHelper\Earnings\User\Total::class,
                ],
                'factories' => [
                    EarningHelper\Earnings\User\Total::class => function ($serviceManager) {
                        return new EarningHelper\Earnings\User\Total(
                            $serviceManager->get(EarningService\Earnings\User\Total::class)
                        );
                    }
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                EarningFactory\Earning::class => function ($serviceManager) {
                    return new EarningFactory\Earning(
                        $serviceManager->get(EarningTable\Earning::class),
                        $serviceManager->get(EntityFactory\EntityType::class)
                    );
                },
                EarningService\Earnings\User::class => function ($serviceManager) {
                    return new EarningService\Earnings\User(
                        $serviceManager->get(EarningFactory\Earning::class),
                        $serviceManager->get(EarningTable\Earning::class)
                    );
                },
                EarningService\Earnings\User\Total::class => function ($serviceManager) {
                    return new EarningService\Earnings\User\Total(
                        $serviceManager->get(EarningTable\Earning::class)
                    );
                },
                EarningTable\Earning::class => function ($serviceManager) {
                    return new EarningTable\Earning(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
