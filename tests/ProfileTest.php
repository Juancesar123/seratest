<?php

namespace Tests;
use Tests\TestCase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Testing\TestResponse;
class ProfileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
      /**
     * @test
     */
    public function create_data_firebase()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwODkvYXBpL2xvZ2luIiwiaWF0IjoxNjc0MTM4OTE5LCJleHAiOjE2NzQxNDI1MTksIm5iZiI6MTY3NDEzODkxOSwianRpIjoiQjllUTRXVjVrUUFGSEZPQyIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.2huaXVhYbCMpDb-Pxszkq0SjO7bP0pQmWNJzm5VuOMo';

        $response = $this->call('POST', '/api/profile/create', ['address' => 'test', 'birth' => '19/09/2011', 'gender' => 'male'], [],[], ['HTTP_Authorization' => 'Bearer '.$token]);

        $this->assertEquals(200,$response->status());
        $response->assertJsonStructure([
            'statusCode'
        ]);
        // $this->assertJsonStructure($response,[
        //     'statusCode'
        // ]);
    }
      /**
     * @test
     */
    public function read_data_firebase(){
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwODkvYXBpL2xvZ2luIiwiaWF0IjoxNjc0MTM4OTE5LCJleHAiOjE2NzQxNDI1MTksIm5iZiI6MTY3NDEzODkxOSwianRpIjoiQjllUTRXVjVrUUFGSEZPQyIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.2huaXVhYbCMpDb-Pxszkq0SjO7bP0pQmWNJzm5VuOMo';

        $response = $this->call('GET', '/api/profile', [], [],[], ['HTTP_Authorization' => 'Bearer '.$token]);

        $this->assertEquals(200,$response->status());
        // $response->assertStatus(200);
    }

       /**
     * @test
     */
    public function update_data_firebase(){
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwODkvYXBpL2xvZ2luIiwiaWF0IjoxNjc0MTM4OTE5LCJleHAiOjE2NzQxNDI1MTksIm5iZiI6MTY3NDEzODkxOSwianRpIjoiQjllUTRXVjVrUUFGSEZPQyIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.2huaXVhYbCMpDb-Pxszkq0SjO7bP0pQmWNJzm5VuOMo';
        $id ='-NM9XAR-n9cVWTYJ5ilM';
        $response = $this->call('PUT', '/api/profile/update/'.$id, ['address' => 'test', 'birth' => '19/09/2011', 'gender' => 'female'], [],[], ['HTTP_Authorization' => 'Bearer '.$token]);

        $this->assertEquals(200,$response->status());
        // $response->assertStatus(200);
    }
        /**
     * @test
     */
    public function delete_data_firebase(){
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwODkvYXBpL2xvZ2luIiwiaWF0IjoxNjc0MTM4OTE5LCJleHAiOjE2NzQxNDI1MTksIm5iZiI6MTY3NDEzODkxOSwianRpIjoiQjllUTRXVjVrUUFGSEZPQyIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.2huaXVhYbCMpDb-Pxszkq0SjO7bP0pQmWNJzm5VuOMo';
        $id = '-NM9XAR-n9cVWTYJ5ilM';
        $response = $this->call('DELETE', '/api/profile/delete/'.$id, [], [],[], ['HTTP_Authorization' => 'Bearer '.$token]);

        $this->assertEquals(200,$response->status());
        // $response->assertStatus(200);
    }
}
