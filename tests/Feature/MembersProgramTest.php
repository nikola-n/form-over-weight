<?php

namespace Tests\Feature;

use App\Member;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MembersProgramTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_member_can_schedule_program()
    {

    }
//is not working
    /** @test */
    public function user_can_be_a_member()
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(Member::class, $user->member);
    }
}
