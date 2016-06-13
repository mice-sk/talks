<?php
namespace Demo;

class CourseProvider{
    /**
     * Provides exchange rate, calling external service via cURL
     *
     * @param $from
     * @param $to
     * @return float
     */
    public function getExchangeRate($from, $to){
        // for sake of presentation, let's say that the below code fetches a JSON via cURL

        switch(true){
            case ($from === 'SVK' && $to === 'EUR'):
                return 1/30.126;

            case ($from === 'EUR' && $to === 'SVK'):
                return 30.126;

            default:
                throw new \InvalidArgumentException('currency not supported');
        }
    }
}
