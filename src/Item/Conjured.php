<?php
/**
 * @author Rik Somers
 * @author Rik Somers <git@riksomers.nl>
 * Created at : 4-5-2016
 */

namespace App\Item;


use App\Item;

class Conjured extends Item
{
    /**
     * Updates values in a tick
     */
    public function tick()
    {
        parent::tick();

        $this->changeQualityBy(-2);

        if($this->isPassedSellIn())
            $this->changeQualityBy(-2);
    }
}