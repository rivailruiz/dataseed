<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        // Run database migrations
        Artisan::call('migrate');

        // Seed test data
        $this->seed();
    }

    /** @test */
    public function it_can_update_user_data()
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $updatedData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
        ];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->put('/api/user', $updatedData);

        $response->assertStatus(200);

        $response->assertJson([
            'message' => 'User updated successfully',
            'user' => [
                'name' => $updatedData['name'],
                'email' => $updatedData['email'],
            ],
        ]);

        $this->assertDatabaseHas('users', $updatedData);
    }

    /** @test */
    public function it_can_delete_user()
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
            ->delete('/api/user');

        $response->assertStatus(200);

        $response->assertJson([
            'message' => 'User deleted successfully',
        ]);

        $this->assertDeleted('users', ['id' => $user->id]);
    }
}
