<?php


class WidgetHandler
{
    private $recommends = [];
    private $packs;

    public function __construct()
    {
        $this->packs = [250, 500, 1000, 2000, 5000];
    }

    public function setPacks($array)
    {
        //In case array value has changed
        $this->packs = $array;
    }

    public function getPacks($order) {
        if($order > $this->packs[0] && $order < $this->packs[1]){
            $this->recommends[] = $this->packs[1];
        }else{
            $closest = null;
            foreach ($this->packs as $pack) {
                if ($closest == null || abs($order - $closest) > abs($pack - $order)) {
                    $closest = $pack;
                }
            }

            $this->recommends[] = $closest;
            $order = $order - $closest;
            if($order >= 1){
                $this->getPacks($order);
            }
        }
        return $this->recommends;
    }

}