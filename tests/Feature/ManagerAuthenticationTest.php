<?php

namespace Tests\Feature;

use App\Models\Manager;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManagerAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('manager/login');

        $response->assertStatus(200);
    }

    public function test_managers_can_authenticate_using_the_login_screen()
    {
        $manager = Manager::factory()->create();

        $response = $this->post('manager/login', [
            'email' => $manager->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('manager');
        $response->assertRedirect(route('manager.dashboard'));
    }

    public function test_managers_can_not_authenticate_with_invalid_password()
    {
        $manager = Manager::factory()->create();

        $this->post('manager/login', [
            'email' => $manager->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('manager');
    }
}
