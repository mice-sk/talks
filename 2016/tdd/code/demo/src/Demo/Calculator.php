<?php
namespace Demo;

class Calculator implements CalculatorInterface
{
    private $course_provider;

    public function __construct(CourseProvider $provider)
    {
        $this->course_provider = $provider;
    }

    /** @inheritdoc */
    public function add($x, $y)
    {
        return $x + $y;
    }

    /** @inheritdoc */
    public function sub($x, $y)
    {
        return $x - $y;
    }

    /** @inheritdoc */
    public function mul($x, $y)
    {
        return $x * $y;
    }

    /** @inheritdoc */
    public function div($x, $y)
    {
        if($y == 0){
            throw new \InvalidArgumentException('division by zero');
        }

        return $x / $y;
    }

    /** @inheritdoc */
    public function convert($from, $to, $amount)
    {
        $rate = $this->course_provider->getExchangeRate($from, $to);

        return $this->mul($amount, $rate);
    }
}
