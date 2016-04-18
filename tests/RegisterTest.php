<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/auth/register')
            ->type('liuping2', 'name')
            ->type('liuping2@qq.com', 'email')
            ->type('liuping2', 'password')
            ->type('liuping2', 'password_confirmation')
            ->press('register')
            ->see('liuping2登录成功');
    }
}
