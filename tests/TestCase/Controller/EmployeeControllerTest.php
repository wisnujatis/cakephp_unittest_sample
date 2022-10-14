<?php

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class EmployeeControllerTest extends TestCase {

    use IntegrationTestTrait;

    public function setUp(): void
    {
        parent::setUp();

        // remove all existing data
        $emp = $this->getTableLocator()->get('Employees');
        $emp->deleteAll([]);
    }

    public function testListEmployees(): void
    {
        $this->get('/api/list-employees.json');

        $this->assertResponseOk();
    }

    public function testAddEmployees(): void
    {
        $name = "user_" . time();
        $data = [
            "name" => $name,
            "email" => $name . "@mail.com"
        ];

        $this->post('/api/add-employee.json', $data);

        $this->assertResponseOk();
        $this->assertResponseSuccess();
        $employee = $this->getTableLocator()->get('Employees');
        $query = $employee->find()->where(['name' => $data['name']]);
        $this->assertEquals(1, $query->count());
    }

    public function tearDown(): void
    {
        parent::tearDown();

        // remove test data
        $emp = $this->getTableLocator()->get('Employees');
        $emp->deleteAll([]);
    }
}