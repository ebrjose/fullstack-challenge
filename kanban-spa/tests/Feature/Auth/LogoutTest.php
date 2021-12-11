<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    // public function authenticated_user_can_logout()
    // {
    //     $user = User::factory()->create();
    //     Sanctum::actingAs($user);
    //     $this->assertAuthenticated();

    //     $response = $this->postJson(route('auth.logout'));

    //     $response->dump();

    //     // $this->assertGuest();
    //     $response->assertNoContent();
    // }
}
