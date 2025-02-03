<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginFunctionalityTest extends TestCase
{
    use RefreshDatabase;

    protected $student;
    protected $payment;

    protected function setUp(): void
    {
        parent::setUp();

        $this->student = User::factory()->create([
            'role' => 'student',
            'password' => bcrypt('studentpass'),
        ]);

        $this->payment = Payment::factory()->create([
            'student_id' => $this->student->id,
            'status' => 'completed',
        ]);
    }

    public function test_login_with_correct_credentials()
    {
        $response = $this->post('/login', [
            'email' => $this->student->email,
            'password' => 'studentpass',
        ]);

        $response->assertRedirect('/student/dashboard');
        $this->assertAuthenticatedAs($this->student);
    }

    public function test_login_with_incorrect_credentials()
    {
        $response = $this->post('/login', [
            'email' => 'invaliduser@example.com',
            'password' => 'invalidpass',
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    public function test_login_using_empty_fields()
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors(['email', 'password']);
    }
}
