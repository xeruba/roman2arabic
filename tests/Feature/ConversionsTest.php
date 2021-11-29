<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConversionsTest extends TestCase
{
    public function test()
    {
        $reference_array = [
            'XV' => 15,
            'XXX' => 30,
            '_X_V' => 15000,
            '_X_VIV' => 15004,
            'I' => 1,
            'V' => 5,
            'X' => 10,
            '_M_D' => 1500000,
        ];
    
        foreach($reference_array as $reference_key => $reference_value){

            $response = $this->postJson('/api/convert', ['roman' => $reference_key]);

            $response->assertJson(['arabic' => $reference_value], $strict = false);
    
            $response->assertStatus(200);
        }
    }

}
