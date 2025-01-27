<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationFunctionalityTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_form_is_accessible()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
        $response->assertSee('Register');
    }

    public function test_successful_registration()
    {
        $studentData = [
            'full_name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->post(route('register'), $studentData);

        $response->assertRedirect(route('show.registration.payment'));
        $user = User::where('email', 'johndoe@gmail.com')->first();
        $this->assertAuthenticatedAs($user);
    }

    public function test_registration_fails_with_wrong_email()
    {
        $studentData = [
            'full_name' => 'John Doe',
            'email' => 'wrong-email',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->post(route('register'), $studentData);

        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    /**
     * Test registration fails with missing fields.
     */
    public function test_registration_fails_with_missing_fields()
    {
        $studentData = [
            'full_name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => '',
        ];

        $response = $this->post(route('register'), $studentData);

        $response->assertSessionHasErrors(['full_name', 'email', 'password']);
        $this->assertGuest();
    }
}