<?php
/**
 * @author Rik Somers
 * @author Rik Somers <git@riksomers.nl>
 * Created at : 4-5-2016
 */
namespace App\Item;

use App\Item;

class BackstagePass extends Item
{
    /**
     * Updates values in a tick.
     */
    public function tick()
    {
        parent::tick();

        if ($this->isOnSellIn()) {
            $this->quality = 0;

            return;
        }

        $this->changeQualityBy(1);

        if ($this->isWithInDaysOfSellIn(10)) {
            $this->changeQualityBy(1);
        }

        if ($this->isWithInDaysOfSellIn(5)) {
            $this->changeQualityBy(1);
        }
    }
}
