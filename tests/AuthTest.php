<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     /**
     * @test
     */
    public function auth_test()
    {
        $response = $this->call('POST', '/api/login',['email' => 'admin@admin.com', 'password' => 'admin123']);
        $this->assertEquals(200, $response->status());
    }
     /**
     * @test
     */
    public function register_test()
    {
        $response = $this->call('POST', '/api/register',["name" => "Juan Ceasar Andrianto",'email' => 'juancesarandriant@gmail.com', 'password' => 'admin123']);
        $this->assertEquals(200, $response->status());
    }
}
