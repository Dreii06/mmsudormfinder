<?php

namespace Tests\Feature;

use App\Models\Manager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManagerPasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered()
    {
        $manager = Manager::factory()->create();

        $response = $this->actingAs($manager, 'manager')->get('manager/confirm-password');

        $response->assertStatus(200);
    }

    public function test_password_can_be_confirmed()
    {
        $manager = Manager::factory()->create();

        $response = $this->actingAs($manager, 'manager')->post('manager/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password()
    {
        $manager = Manager::factory()->create();

        $response = $this->actingAs($manager, 'manager')->post('manager/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
