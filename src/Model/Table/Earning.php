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

    /**
     * Select where user ID.
     *
     * @param int $userId
     * @yield array
     * @return Generator
     */
    public function selectWhereUserId(int $userId) : Generator
    {
        $sql = '
            SELECT `earning`.`earning_id`
                 , `earning`.`user_id`
                 , `earning`.`entity_id`
                 , `earning`.`entity_type_id`
                 , `earning`.`type_id`
                 , `earning`.`amount`
                 , `earning`.`created`
              FROM `earning`
             WHERE `earning`.`user_id` = :userId
             ORDER
                BY `earning`.`created` ASC
                 ;
        ';
        $parameters = [
            'userId' => $userId,
        ];
        $resultSet = $this->adapter->query($sql)->execute($parameters);

        foreach ($resultSet as $array) {
            yield $array;
        }
    }
}
