<?php
namespace LeoGalleguillos\Earning;

use LeoGalleguillos\Earning\Model\Factory as EarningFactory;
use LeoGalleguillos\Earning\Model\Service as EarningService;
use LeoGalleguillos\Earning\Model\Table as EarningTable;
use LeoGalleguillos\Earning\View\Helper as EarningHelper;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
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
                        $serviceManager->get(EarningTable\Earning::class)
                    );
                },
                EarningService\Earnings\User::class => function ($serviceManager) {
                    return new EarningService\Earnings\User(
                        $serviceManager->get(EarningFactory\Earning::class),
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
