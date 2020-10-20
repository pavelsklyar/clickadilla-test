<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndicatorTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGenerateIndicator()
    {
        $data = [
            [
                'type' => "string",
                'length' => 25,
            ],
            [
                'type' => "alphanumeric",
                'length' => 25,
            ],
            [
                'type' => "numeric",
                'length' => 25,
            ],
            [
                'type' => "string",
            ],
            [
                'type' => "alphanumeric",
            ],
            [
                'type' => "numeric",
            ],
            [
                'type' => "guid",
            ],
            [
                'length' => 25,
            ],
        ];

        foreach ($data as $item) {
            $response = $this->json("POST", route("indicators.generate"), $item);

            $response->assertJson([
                'success' => true
            ])->assertJsonStructure([
                'success',
                'data' => [
                    'id'
                ]
            ]);
        }
    }

    public function testGenerateIndicatorTypeError()
    {
        $data = [
            [
                'type' => "qwertyuiop",
            ],
        ];

        foreach ($data as $item) {
            $response = $this->json("POST", route("indicators.generate"), $item);

            $response->assertJson([
                'success' => false
            ])->assertJsonStructure([
                'success',
                'error'
            ]);
        }
    }

    public function testGenerateIndicatorLengthError()
    {
        $data = [
            [
                "length" => 0
            ],
            [
                "length" => -100
            ],
        ];

        foreach ($data as $item) {
            $response = $this->json("POST", route("indicators.generate"), $item);

            $response->assertJson([
                'success' => false
            ])->assertJsonStructure([
                'success',
                'error'
            ]);
        }
    }

    public function testGetIndicator()
    {
        $this->testGenerateIndicator();

        $id = 1;
        $response = $this->json("GET", route("indicators.get", $id));
        $response->assertJson([
            'success' => true
        ])->assertJsonStructure([
            'success',
            'data' => [
                'id',
                'type',
                'value',
                'created_at',
                'updated_at'
            ]
        ]);

        $id = 100500;
        $response = $this->json("GET", route("indicators.get", $id));
        $response->assertJson([
            'success' => false
        ])->assertJsonStructure([
            'success',
            'error'
        ]);
    }
}
