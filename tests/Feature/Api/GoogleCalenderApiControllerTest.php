<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GoogleCalenderApiControllerTest extends TestCase
{
    /**
     * @test
     */
    public function GoogleカレンダーAPIを実行して、200ステータスコードが帰ってくる()
    {
        $response = $this->get(action('App\Http\Controllers\GoogleCalenderApiController@confirmIsMtg'));
        $response->assertOk();
    }

    /**
     * @test
     */
    public function GoogleカレンダーAPIを実行して、返却されたjsonにIsMtg属性が含まれている()
    {
        $response = $this->get(action('App\Http\Controllers\GoogleCalenderApiController@confirmIsMtg'));
        $response
            ->assertJson(fn (AssertableJson $json) => 
                $json->has('isMtg')
            );
    }
}
