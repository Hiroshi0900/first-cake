<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TKeisansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TKeisansTable Test Case
 */
class TKeisansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TKeisansTable
     */
    public $TKeisans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TKeisans',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TKeisans') ? [] : ['className' => TKeisansTable::class];
        $this->TKeisans = TableRegistry::getTableLocator()->get('TKeisans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TKeisans);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
