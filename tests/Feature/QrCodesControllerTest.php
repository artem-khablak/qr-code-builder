<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class QrCodesControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    /**
     * vendor/bin/phpunit --filter 'Tests\\Feature\\QrCodesControllerTest::test_create_qr_code'
     * @param array $requestData
     * @dataProvider providerCreateQrCode
     * @param callable $expectedResult
     * */
    public function test_create_qr_code(array $requestData, callable $expectedResult)
    {
        $user = User::factory()
            ->create();

        Auth::login($user);
        $response = $this->post(route('qr-codes-store'), $requestData);

        $expectedResult($response);
    }

    public function providerCreateQrCode()
    {
        return [
            [
                'requestData' => [
                    'content' => 'test',
                    'size' => 200,
                    'background_color' => '#000000',
                    'fill_color' => '#000000'
                ],
                'expectedResult' => function (TestResponse $testResponse) {
                    $testResponse->assertJsonStructure([
                        'data' => [
                            'qr_code',
                            'height',
                            'width'
                        ]
                    ]);
                }
            ],
            [
                'requestData' => [
                    'content' => '+380990000',
                    'size' => 150,
                    'background_color' => '#ffffff',
                    'fill_color' => '#ffffff'
                ],
                'expectedResult' => function (TestResponse $testResponse) {
                    $testResponse->assertJsonStructure([
                        'data' => [
                            'qr_code',
                            'height',
                            'width'
                        ]
                    ]);
                }
            ]
        ];
    }
}
