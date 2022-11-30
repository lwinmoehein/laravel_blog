<?php

namespace Tests\Unit;

use App\Traits\SlugTrait;
use PHPUnit\Framework\TestCase;

class SlugTest extends TestCase
{
    use SlugTrait;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue($this->getSlugFromString("ပြည်ထောင်စု သမ္မတ မြန်မာနိုင်ငံ is the most be  & အလေးပြု * ဟားဟား")=="ပြည်ထောင်စု-သမ္မတ-မြန်မာနိုင်ငံ-is-the-most-be-အလေးပြု-ဟားဟား");
    }
}
