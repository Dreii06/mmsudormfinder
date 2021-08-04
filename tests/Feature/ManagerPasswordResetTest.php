<?php

namespace Tests\Feature;

use App\Models\Manager;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ManagerPasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered()
    {
        $response = $this->get('manager/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested()
    {
        Notification::fake();

        $manager = Manager::factory()->create();

        $response = $this->post('manager/forgot-password', [
            'email' => $manager->email,
        ]);

        Notification::assertSentTo($manager, ResetPassword::class);
    }

    public function test_reset_password_screen_can_be_rendered()
    {
        Notification::fake();

        $manager = Manager::factory()->create();

        $response = $this->post('manager/forgot-password', [
            'email' => $manager->email,
        ]);

        Notification::assertSentTo($manager, ResetPassword::class, function ($notification) {
            $response = $this->get('manager/reset-password/'.$notification->token);

            $response->assertStatus(200);

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token()
    {
        Notification::fake();

        $manager = Manager::factory()->create();

        $response = $this->post('manager/forgot-password', [
            'email' => $manager->email,
        ]);

        Notification::assertSentTo($manager, ResetPassword::class, function ($notification) use ($manager) {
            $response = $this->post('manager/reset-password', [
                'token' => $notification->token,
                'email' => $manager->email,
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);

            $response->assertSessionHasNoErrors();

            return true;
        });
    }
}
