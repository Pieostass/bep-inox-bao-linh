<?php

namespace Tests\Feature;

use Database\Seeders\CatalogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CatalogSeeder::class);
    }

    /**
     * Test catalog homepage renders successfully
     */
    public function test_catalog_homepage_returns_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('BẢO LINH');
        $response->assertSee('0111524104');
        $response->assertSee('bepbaolinh38@gmail.com');
        $response->assertSee('7338666888');
    }

    /**
     * Test product details page renders successfully
     */
    public function test_product_detail_page_returns_successful_response(): void
    {
        $response = $this->get('/san-pham/lo-nuong-doi-luu-5-khay-southstar');

        $response->assertStatus(200);
        $response->assertSee('Lò Nướng Bánh Đối Lưu 5 Khay Southstar');
        $response->assertSee('THÔNG SỐ KỸ THUẬT');
        $response->assertSee('7338666888');
        $response->assertSee('MB Bank');
        $response->assertSee('0988.666.888');
    }

    /**
     * Test information pages (about, factory, policy, contact, news)
     */
    public function test_information_pages_render_successfully(): void
    {
        $this->get('/gioi-thieu')->assertStatus(200)->assertSee('CÔNG TY TNHH BẾP INOX BẢO LINH');
        $this->get('/xuong-san-xuat')->assertStatus(200)->assertSee('Số 15, Ngõ 419 Đường Lĩnh Nam');
        $this->get('/chinh-sach')->assertStatus(200)->assertSee('Bảo Hành 12 Tháng');
        $this->get('/lien-he')->assertStatus(200)->assertSee('0988.666.888');
        $this->get('/tin-tuc')->assertStatus(200)->assertSee('TIN TỨC');
    }

    /**
     * Test quote submission
     */
    public function test_quote_request_submission(): void
    {
        $response = $this->post('/bao-gia', [
            'customer_name' => 'Nguyễn Văn A',
            'phone' => '0912345678',
            'company_or_address' => 'Hà Nội',
            'notes' => 'Cần tư vấn lò nướng',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('quote_requests', [
            'customer_name' => 'Nguyễn Văn A',
            'phone' => '0912345678',
        ]);
    }
}
