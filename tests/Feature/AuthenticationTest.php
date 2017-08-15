<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    public function testGenerateTokenWhenUserNoFillData()
    {
        $response = $this->json('POST', '/api/v1/auth', ['email' => '', 'password' => '']);

        $response
            ->assertStatus(401)
            ->assertJson(['status' => 'fail']);
    }
}
