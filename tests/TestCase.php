<?php

namespace Tests;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Adds a simple setup that runs on every test caes.
     * 
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();        
    }

    /**
     * Mocks and acts like a non-admin user factory.
     * 
     * @param $user
     * 
     */
    protected function asNonAdmin($user = null)
    {
        $this->actingAs($this->nonAdmin(), 'web');

        return $this;
    }

    /**
     * Creates an non-admin user factory.
     * 
     * @param $user
     * 
     */
    protected function nonAdmin($user = null)
    {
        return $this->nonAdmin ?? match (true) {
            $user instanceof User => $user,
            $user instanceof UserFactory => $user->create(),
            default => User::factory()->user()->create()
        };
    }

    /**
     * Mocks and acts like an admin.
     * 
     * @param $user
     * 
     */
    protected function asAdmin($user=null)
    {
        $this->actingAs($this->admin(), 'web');

        return $this;
    }

    /**
     * Creates an admin user factory.
     * 
     * @param $user
     * 
     */
    protected function admin($user = null)
    {
        return $this->admin ?? match (true) {
            $user instanceof User => $user,
            $user instanceof UserFactory => $user->create(),
            default => User::factory()->admin()->create()
        };
    }

}
