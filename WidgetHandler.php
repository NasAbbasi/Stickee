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


    public function getPacks($order){
        if($order > 0 && $order <= $this->packs[0]){
            $this->recommends[] = $this->packs[0];
        }else{
            $pointer = count($this->packs) - 1;
            while($pointer > 0){
                // Check minimum of biggest options
                if($this->checkMinBiggest($order, $pointer)){
                    break;
                }
                $a = $order - $this->packs[$pointer];
                if($a >= 0){
                    $this->recommends[] = $this->packs[$pointer];
                    $order = $a;
                    if($a != 0 && $a <= $this->packs[0]){
                        $this->recommends[] = $this->packs[0];
                    }
                }else{
                    $pointer--;
                    if($pointer < 0){
                        $pointer = 0;
                    }
                }
            }
        }

        return $this->recommends;
    }

    private function checkMinBiggest($order, $pointer){
        if($order < $this->packs[$pointer] && $order >= $this->packs[$pointer - 1]) {
            $minBig = $this->packs[$pointer];
            if ($minBig - $order < $this->packs[0]) {
                $this->recommends[] = $minBig;
                return true;
            }
        }
    }

}