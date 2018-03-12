<?php
namespace LeoGalleguillos\Earning\Model\Table;

use Exception;
use Generator;
use Zend\Db\Adapter\Adapter;

class Earning
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }
}
