<?php
namespace LeoGalleguillos\EarningTest\Model\Table;

use ArrayObject;
use Exception;
use Generator;
use LeoGalleguillos\Earning\Model\Table as EarningTable;
use LeoGalleguillos\EarningTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class EarningTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/earning/';

    protected function setUp(): void
    {
        $configArray     = require(__DIR__ . '/../../../config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter   = new Adapter($configArray);

        $this->earningTable      = new EarningTable\Earning($this->adapter);

        $this->setForeignKeyChecks0();
        $this->dropTable();
        $this->createTable();
        $this->setForeignKeyChecks1();
    }

    protected function dropTable()
    {
        $sql = file_get_contents($this->sqlPath . 'drop.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    protected function createTable()
    {
        $sql = file_get_contents($this->sqlPath . 'create.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            EarningTable\Earning::class,
            $this->earningTable
        );
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
