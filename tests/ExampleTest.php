<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        /*$this->visit('/')
             ->see('Laravel 5');*/

        /*$this->visit('/')
             ->click('about-us');
             ->seePageIs('/about-us');*/

        /*$this->visit('/register')
             ->type('Taylor', 'name')
             ->check('terms')
             ->press('Register')
             ->seePageIs('/dashboard');*/

        /*$this->visit('/upload')
            ->name('File Name', 'name')
            ->attach($absolutePathToFile, 'photo')
            ->press('Upload')
            ->see('Upload Successful!');*/

        /*$this->post('/user', ['name' => 'Sally'])
             ->seeJson([
                'created' => true,
             ]);*/

        /*$this->post('/user', ['name' => 'Sally'])
            ->seeJsonEquals([
                'created' => true,
            ]);*/

        /*$this->get('/user/1')
             ->seeJsonStructure([
                 'name',
                 'pet' => [
                     'name', 'age'
                 ]
             ]);*/

        /*$this->get('/user')
             ->seeJsonStructure([
                 '*' => [
                    'id', 'name', 'email'
                 ]
             ]);*/

        /*$this->get('/user')
            ->seeJsonStructure([
                '*' => [
                    'id', 'name', 'email', 'pets' => [
                      'name', 'age'
                    ]
                ]
            ]);*/

    }

    public function testApplication()
    {
        /*$this->withSession(['foo' => 'bar'])
             ->visit('/');*/

        $user = factory('App\User')->create();

        $this->actingAs($user)
             ->withSession(['foo' => 'bar'])
             ->visit('/')
             ->see('Hello, '.$user->name);
    }
}


