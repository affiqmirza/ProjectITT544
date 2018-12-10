<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SessionsFixture
 *
 */
class SessionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 99, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'problems' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Bookingid' => ['type' => 'integer', 'length' => 99, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'Bookingid' => ['type' => 'index', 'columns' => ['Bookingid'], 'length' => []],
            'Bookingid_3' => ['type' => 'index', 'columns' => ['Bookingid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'Bookingid_2' => ['type' => 'unique', 'columns' => ['Bookingid'], 'length' => []],
            'Booking_ID' => ['type' => 'foreign', 'columns' => ['Bookingid'], 'references' => ['booking', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'problems' => 'Lorem ipsum dolor sit amet',
                'Bookingid' => 1
            ],
        ];
        parent::init();
    }
}
