<?php
/**
 * @author Rik Somers
 * @author Rik Somers <git@riksomers.nl>
 * Created at : 4-5-2016
 */

namespace App;


class Item
{
    /**
     * The maximum quality of an item
     */
    const MaxQuality = 50;

    /**
     * The minimum quality of an item
     */
    const MinQuality = 0;

    /**
     * @var
     */
    public $quality;

    /**
     * @var
     */
    public $sellIn;

    /**
     * Item constructor.
     *
     * @param $quality
     * @param $sellIn
     */
    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    /**
     * Updates values in a tick
     */
    protected function tick()
    {
        $this->changeSellInBy(-1);
    }


    /**
     * Gaurds whether the quality is above the maximum quality, or below the minimum quality
     *
     * @return bool
     */
    protected function guardQuality()
    {
        if($this->guardMaxQuality() || $this->guardMinQuality()) {
            return true;
        }
    }

    /**
     * Returns whether it passed the SellIn days
     *
     * @return bool
     */
    protected function isPassedSellIn()
    {
        return $this->sellIn <= 0 ? true : false;
    }

    /**
     * Returns whether it is on the SellIn day
     *
     * @return bool
     */
    protected function isOnSellIn()
    {
        return $this->sellIn < 0 ? true : false;
    }

    /**
     * Change the SellIn days by specified amount
     *
     * @param $amount
     */
    protected function changeSellInBy($amount)
    {
        $this->sellIn += $amount;
    }

    /**
     * Changes the Quality by specified amount
     *
     * @param $amount
     */
    protected function changeQualityBy($amount)
    {
        if($this->guardQuality())
            return;

        $this->quality += $amount;
    }

    /**
     * Gaurds whether the quality is below the minimum quality
     *
     * @return bool
     */
    protected function guardMinQuality()
    {
        return $this->quality <= Item::MinQuality ? true : false;
    }

    /**
     * Gaurds wheter the quality is above the maximum quality
     *
     * @return bool
     */
    protected function guardMaxQuality()
    {
        return $this->quality >= Item::MaxQuality ? true : false;
    }

    /**
     * Returns whether the SellIn is within a given amount of days
     *
     * @param $days
     * @return bool
     */
    protected function isWithInDaysOfSellIn($days)
    {
        return $this->sellIn < $days ? true : false;
    }

}