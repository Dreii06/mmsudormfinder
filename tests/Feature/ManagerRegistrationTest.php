<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManagerRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('manager/register');

        $response->assertStatus(200);
    }

    public function test_new_managers_can_register()
    {
        $response = $this->post('manager/register', [
            'name' => 'Test Manager',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated('manager');
        $response->assertRedirect(route('manager.dashboard'));
    }
}
