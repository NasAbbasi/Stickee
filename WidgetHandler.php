<?php


class WidgetHandler
{
    private $recommends = [];
    private $packs;

    public function __construct()
    {
        $this->packs = [250, 300, 500, 1000, 2000, 5000];
//        $this->packs = [100, 250, 300, 500, 600, 1000, 2000, 5000];
    }

    public function setPacks($array)
    {
        //In case array value has changed
        $this->packs = $array;
    }

    public function getPacks($order){
        if($order > 0){
            $pointer = 0;
            $biggestMin = $min = $topRemain = null;
            while($pointer < count($this->packs)){
                $remainder = $order % $this->packs[$pointer];
                if($remainder == 0){
                    $topRemainder = $remainder;
                }else{
                    //To find bigger multiplier remains
                    $topRemainder = $this->packs[$pointer] - $remainder;
                }
                if($min === null || $topRemainder <= $min){
                    $min = $topRemainder;
                    $biggestMin = $this->packs[$pointer];
                }
                $pointer++;
            }
            $this->recommends[] = $biggestMin;
            $order = $order - $biggestMin;
            if($order > 0){
                $this->getPacks($order);
            }
        }

        return $this->recommends;
    }

}