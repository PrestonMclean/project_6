<?php

use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase
{
  /** @test */
  public function unableToCreateListingDataUnavailable (): void
  {
    $data = [];
    $this->expectException(\Exception::class);
    $listing = new ListingBasic($data);
  }

  /** @test */
  public function unableToCreateListingInvalidId (): void
  {
    $data = [
      'blank'
    ];
    $this->expectException(\Exception::class);
    $listing = new ListingBasic($data);
  }

  /** @test */
  public function unableToCreateListingInvalidTitle (): void
  {
    $data = [
      'id' => 1,
      'blank'
    ];
    $this->expectException(\Exception::class);
    $listing = new ListingBasic($data);

  }

  /** @test */
  public function createListingObject (): void
  {
    $data = [
      'id' => 1,
      'title' => 'blank'
    ];
    $listing = new ListingBasic($data);
    $this->assertIsObject($listing);
  }

  /** @test */
  public function statusBasic (): void
  {
    $data = [
      'id' => 1,
      'title' => 'title'
    ];
    $listing = new ListingBasic($data);
    $this->assertEquals('basic', $listing->getStatus());
  }

  /** @test */
  public function statusBlank (): void
  {
    $data = [
      'id' => 1,
      'title' => 'title',
      'status' => ''
    ];
    $listing = new ListingBasic($data);
    $this->assertEquals('basic', $listing->getStatus());
  }

  /** @test */
  public function statusSet (): void
  {
    $data = [
      'id' => 1,
      'title' => 'title',
      'status' => 'testing'
    ];
    $listing = new ListingBasic($data);
    $this->assertEquals($data['status'], $listing->getStatus());
  }

  /** @test */
  public function getData (): void
  {
    $data = [
      'id' => 1,
      'title' => 'title',
      'website' => 'website.com',
      'email' => 'Email@email.com',
      'twitter' => 'twiter'
    ];
    $listing = new ListingBasic($data);
    $this->assertEquals(1, $listing->getId());
    $this->assertEquals('title', $listing->getTitle());
    $this->assertEquals('http://website.com', $listing->getWebsite());
    $this->assertEquals('Email@email.com', $listing->getEmail());
    $this->assertEquals('twiter', $listing->getTwitter());
  }

  /** @test */
  public function arrayData (): void
  {
    $data = [
      'id' => 1,
      'title' => 'title',
      'website' => 'website.com',
      'email' => 'Email@email.com',
      'twitter' => 'twiter'
    ];
    $listing = new ListingBasic($data);
    $this->assertEquals($data['id'],$listing->toArray()['id']);
    $this->assertEquals($data['title'],$listing->toArray()['title']);
    $this->assertEquals("http://".$data['website'],$listing->toArray()['website']);
    $this->assertEquals($data['email'],$listing->toArray()['email']);
    $this->assertEquals($data['twitter'],$listing->toArray()['twitter']);
  }

  /** @test */
  public function blankWebsite (): void
  {
    $data = [
      'id' => 1,
      'title' => 'title',
      'website' => '',
    ];
    $listing = new ListingBasic($data);
    $this->assertEquals(null,$listing->getWebsite());
  }
}
