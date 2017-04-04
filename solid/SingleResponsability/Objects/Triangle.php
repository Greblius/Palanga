<?php

class Triangle implements FigureInterface
{
    /** @var  float */
    private $lenght1, $length2, $length3;

    /**
     * Triangle constructor.
     * @param float $length1
     * @param float $length2
     * @param float $length3
     */
    public function __construct($length1, $length2, $length3)
    {
        $this->lenght1 = $length1;
        $this->length2 = $length2;
        $this->length3 = $length3;
    }

    /**
     * @return float
     */
    public function countArea()
    {
        return sqrt(
            $this->getHalfPerimeter()*($this->getHalfPerimeter() - $this->lenght1)
            * $this->getHalfPerimeter()*($this->getHalfPerimeter() - $this->length2)
            * $this->getHalfPerimeter()*($this->getHalfPerimeter() - $this->length3)
        );
    }

    /**
     * @return float
     */
    public function countPerimeter()
    {
        return $this->lenght1 + $this->length2 + $this->length3;
    }

    /**
     * @return float
     */
    private function getHalfPerimeter()
    {
        return $this->countPerimeter() / 2;
    }
}