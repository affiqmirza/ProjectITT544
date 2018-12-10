<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingFixture
 *
 */
class BookingFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'booking';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 99, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'time' => ['type' => 'time', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'usersid' => ['type' => 'integer', 'length' => 99, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'roomid' => ['type' => 'integer', 'length' => 99, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'Counsellor_ID' => ['type' => 'index', 'columns' => ['usersid'], 'length' => []],
            'Room_ID' => ['type' => 'index', 'columns' => ['roomid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'Room_ID' => ['type' => 'foreign', 'columns' => ['roomid'], 'references' => ['rooms', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Users_ID' => ['type' => 'foreign', 'columns' => ['usersid'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'date' => '2018-12-08',
                'time' => '10:19:44',
                'usersid' => 1,
                'roomid' => 1
            ],
        ];
        parent::init();
    }
}
