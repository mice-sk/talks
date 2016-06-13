<?php
namespace Demo;

interface CalculatorInterface{
    /**
     * Adds provided arguments
     *
     * @param int $x
     * @param int $y
     * @return int
     */
    public function add($x, $y);

    /**
     * Subtracts provided arguments
     *
     * @param int $x
     * @param int $y
     * @return int
     */
    public function sub($x, $y);

    /**
     * Multiplies provided arguments
     *
     * @param int $x
     * @param int $y
     * @return int
     */
    public function mul($x, $y);

    /**
     * Divides provided arguments
     *
     * @param $x
     * @param $y
     *
     * @throws \InvalidArgumentException when second argument is zero
     *
     * @return float
     */
    public function div($x, $y);

    /**
     * Converts provided amount from source currency to target currency
     *
     * @param string $from
     * @param string $to
     * @param int $amount
     * @return float
     */
    public function convert($from, $to, $amount);
}
