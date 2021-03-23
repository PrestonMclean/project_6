<?php

use PHPUnit\Framework\TestCase;

class ListingPremiumTest extends TestCase
{
  /** @test */
  public function statusPremium (): void
  {
    $data = [
      'id' => 1,
      'title' => 'title'
    ];
    $listing = new ListingPremium($data);
    $this->assertEquals('premium', $listing->getStatus());
  }
  /** @test */
  public function getDescription (): void
  {
    $data = [
      'id' => 1,
      'title' => 'title',
      'description' => 'A short description'
    ];
    $listing = new ListingPremium($data);
    $this->assertEquals('A short description', $listing->getDescription());
  }

  /** @test */
  public function allowedTags (): void
  {
    $data = [
      'id' => 1,
      'title' => 'title'
    ];
    $tags = htmlspecialchars('<p><br><b><strong><em><u><ol><ul><li>');
    $listing = new ListingPremium($data);
    $this->assertEquals($tags, $listing->displayAllowedTags());
  }
}
