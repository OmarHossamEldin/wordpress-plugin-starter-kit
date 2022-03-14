<?php

namespace Tests\Unit;

use Wordpress\Support\Facades\Server\Session;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    private Session $session;

    protected function setUp(): void
    {
        $this->session = new Session();
        $this->session->end();
    }

    /** @test */
    public function session_not_active()
    {
        $status = $this->session->status();

        $this->assertFalse($status);
    }

    /** @test */
    public function session_start()
    {
        $this->session->start();

        $status = $this->session->status();

        $this->assertTrue($status);
    }

    /** @test */
    public function session_end()
    {
        $this->session->end();

        $status = $this->session->status();

        $this->assertFalse($status);
    }

    /** @test */
    public function add_items_to_session()
    {
        $this->session->start();
        $status = $this->session->status();

        $this->assertTrue($status);

        $items['user'] = [
            'username' => 'wpArtisan',
            'email' => 'wpArtisan@example.com'
        ];
        $addedItems = $this->session->add_items($items);
        $this->assertNotEmpty($this->session->get_session());
        $this->assertArrayHasKey('user', $addedItems);
        $this->assertArrayNotHasKey('username', $addedItems);
        $this->assertArrayNotHasKey('email', $addedItems);
    }

    /** @test */
    public function clear_session()
    {
        $this->session->start();
        $status = $this->session->status();

        $this->assertTrue($status);
        $item['totalBalance'] = 1000_000;
        $items = $this->session->add_items($item);
        $this->assertNotEmpty($this->session->get_session());
        $this->assertArrayHasKey('totalBalance', $items);
        $this->assertTrue($this->session->clear());
        $this->assertEmpty($this->session->get_session());
    }

    /** @test */
    public function get_items_from_session()
    {
        $this->session->start();
        $status = $this->session->status();

        $this->assertTrue($status);
        $item['cart'] = [
            ['product_id' => 1, 'quantity' => 5, 'cost' => 100],
            ['product_id' => 2, 'quantity' => 2, 'cost' => 200]
        ];
        $this->session->add_items($item);
        $cart = $this->session->get_items('cart');
        $item['cart'] = array_reverse($cart);
        $this->assertEquals($cart, $item['cart']);
    }

    /** @test */
    public function remove_item_from_session()
    {
        $this->session->start();
        $status = $this->session->status();

        $this->assertTrue($status);
        $this->session->add_items(['message' => 'success']);
        $this->assertTrue($this->session->remove_items('message'));
        $result = $this->session->get_items('message');
        $this->assertEmpty($result);
    }

    /** @test */
    public function add_item_with_expiration_expired()
    {
        $this->session->start();
        $status = $this->session->status();
        $this->assertTrue($status);
        $example = 'example';
        $expiration =  time();
        $this->session->add_expiration_items(['token' => $example], $expiration);
        $result = $this->session->get_item_with_expiration('token');
        $this->assertEquals('this value is expired!', $result);
    }

    /** @test */
    public function add_item_with_expiration_not_expired()
    {
        $this->session->start();
        $status = $this->session->status();
        $this->assertTrue($status);
        $example = 'example';
        $expiration =  time() + (10 * 60);
        $this->session->add_expiration_items(['token' => $example], $expiration);
        $result = $this->session->get_item_with_expiration('token');
        $this->assertEquals($result, $example);
    }
}
