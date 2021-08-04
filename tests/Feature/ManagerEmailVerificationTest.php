<?php

namespace Tests\Feature;

use App\Models\Manager;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class ManagerEmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered()
    {
        $manager = Manager::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($manager, 'manager')->get('manager/verify-email');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified()
    {
        Event::fake();

        $manager = Manager::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'manager.verification.verify',
            now()->addMinutes(60),
            ['id' => $manager->id, 'hash' => sha1($manager->email)]
        );

        $response = $this->actingAs($manager, 'manager')->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($manager->fresh()->hasVerifiedEmail());
        $response->assertRedirect(route('manager.dashboard').'?verified=1');
    }

    public function test_email_is_not_verified_with_invalid_hash()
    {
        $manager = Manager::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'manager.verification.verify',
            now()->addMinutes(60),
            ['id' => $manager->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($manager, 'manager')->get($verificationUrl);

        $this->assertFalse($manager->fresh()->hasVerifiedEmail());
    }
}
