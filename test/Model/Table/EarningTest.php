<?php
namespace MonthlyBasis\EarningTest\Model\Table;

use ArrayObject;
use Exception;
use Generator;
use MonthlyBasis\Earning\Model\Table as EarningTable;
use MonthlyBasis\LaminasTest\TableTestCase;
use Laminas\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class EarningTest extends TableTestCase
{
    protected function setUp(): void
    {
        $this->earningTable = new EarningTable\Earning($this->getAdapter());

        $this->setForeignKeyChecks0();
        $this->dropAndCreateTable('earning');
        $this->setForeignKeyChecks1();
    }

    public function testInsert()
    {
        $this->earningTable->insert(1, 2, 3, 4, 5.67);
        $this->earningTable->insert(1, 2, 3, 4, 5.67);
        $this->earningTable->insert(1, 2, 3, 4, 5.67);
        $this->assertSame(
            3,
            $this->earningTable->selectCount()
        );
    }

    public function testSelectCount()
    {
        $this->assertSame(
            0,
            $this->earningTable->selectCount()
        );
        $this->earningTable->insert(1, 2, 3, 4, 5.67);
        $this->earningTable->insert(1, 2, 3, 4, 5.67);
        $this->earningTable->insert(1, 2, 3, 4, 5.67);
        $this->assertSame(
            3,
            $this->earningTable->selectCount()
        );
    }

    public function testSelectWhereUserId()
    {
        //$this->earningTable->insert(123, 'jpg', 'title', 'description');
        //$this->earningTable->insert(123, 'png', 'title2', 'description2');
        $generator = $this->earningTable->selectWhereUserId(123);
        $this->assertInstanceOf(
            Generator::class,
            $generator
        );

        /*
        $this->assertSame(
            $generator->current()['title'],
            'title'
        );
        $generator->next();
        $this->assertSame(
            $generator->current()['title'],
            'title2'
        );
         */
    }
}
