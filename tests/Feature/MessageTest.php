<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\MessageSent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;

class MessageTest extends TestCase
{

    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_add_new_message_in_database()
    {
        $data = [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'email' => $this->faker->email,
            'phone' => '',
            'subject' => $this->faker->title,
            'message' => $this->faker->paragraph
        ];
        $this->json('POST',route('messages.store'),$data);

        $this->assertDatabaseCount('messages',1);
    }

    public function test_return_created_message(){
        $data = [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'email' => $this->faker->email,
            'phone' => '',
            'subject' => $this->faker->title,
            'message' => $this->faker->paragraph
        ];

        User::factory(1)->create();

        $response = $this->json('POST',route('messages.store'),$data);



        $response
            ->assertStatus(201)
            ->assertJson(['data' => [
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'email' => $data['email']
            ]]);

    }

    public function test_notification_sent(){
        Notification::fake();
        $user = User::factory(1)->create();
        $data = [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'email' => $this->faker->email,
            'phone' => '',
            'subject' => $this->faker->title,
            'message' => $this->faker->paragraph
        ];
        $this->json('POST',route('messages.store'),$data);

        Notification::assertSentTo([$user],MessageSent::class);

    }
}
