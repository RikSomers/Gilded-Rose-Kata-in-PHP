<?php
/**
 * @author Rik Somers
 * @author Rik Somers <git@riksomers.nl>
 * Created at : 4-5-2016
 */

namespace App\Item;


use App\Item;

class AgedBrie extends Item
{
    /**
     * Updates values in a tick
     */
    public function tick()
    {
        parent::tick();

        $this->changeQualityBy(1);

        if($this->isPassedSellIn() && !$this->guardMaxQuality())
            $this->changeQualityBy(1);
    }
}