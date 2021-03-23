<?php

use PHPUnit\Framework\TestCase;

class ListingFeaturedTest extends TestCase
{
  /** @test */
  public function statusFeatured (): void
  {
    $data = [
      'id' => 1,
      'title' => 'title'
    ];
    $listing = new ListingFeatured($data);
    $this->assertEquals('featured', $listing->getStatus());
  }
  /** @test */
  public function Coc (): void
  {
    $data = [
      'id' => 1,
      'title' => 'title',
      'coc' => '     <a><p>testing</p></a><br>        '
    ];
    $listing = new ListingFeatured($data);
    $this->assertEquals('<p>testing</p><br>', $listing->getCoc());
  }
}
