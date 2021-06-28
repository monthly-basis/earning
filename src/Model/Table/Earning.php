<?php
namespace MonthlyBasis\Earning\Model\Table;

use Exception;
use Generator;
use Laminas\Db\Adapter\Adapter;

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

    public function insert(
        int $userId,
        int $entityId,
        int $entityTypeId,
        int $typeId,
        float $amount
    ) {
        $sql = '
            INSERT
              INTO `earning` (
                   `user_id`, `entity_id`, `entity_type_id`, `type_id`, `amount`, `created`
                   )
            VALUES (:userId, :entityId, :entityTypeId, :typeId, :amount, UTC_TIMESTAMP())
                 ;
        ';
        $parameters = [
            'userId'       => $userId,
            'entityId'     => $entityId,
            'entityTypeId' => $entityTypeId,
            'typeId'       => $typeId,
            'amount'       => $amount,
        ];
        return $this->adapter
                    ->query($sql, $parameters)
                    ->getGeneratedValue();
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `earning`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
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
