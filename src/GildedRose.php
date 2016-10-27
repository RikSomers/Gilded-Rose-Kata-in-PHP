<?php

namespace App;

class GildedRose
{
    protected static $lookup = [
        'normal'                                    => \App\Item\Normal::class,
        'Aged Brie'                                 => \App\Item\AgedBrie::class,
        'Conjured Mana Cake'                        => \App\Item\Conjured::class,
        'Sulfuras, Hand of Ragnaros'                => \App\Item\Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => \App\Item\BackstagePass::class,
    ];

    public static function of($name, $quality, $sellIn)
    {
        return new static::$lookup[$name]($quality, $sellIn);
    }
}
