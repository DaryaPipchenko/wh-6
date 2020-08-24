<?php

declare(strict_types=1);

namespace Hillel\Wh6;

class Color
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    private function setRed($red): void
    {
        if ($red < 0 && $red > 255) {
            throw new Exception('Red is invalid');
        }

        $this->red = $red;
    }

    private function setGreen($green): void
    {
        if ($green < 0 && $green > 255) {
            throw new Exception('Green is invalid');
        }

        $this->green = $green;
    }

    private function setBlue($blue): void
    {
        if ($blue < 0 && $blue > 255) {
            throw new Exception('Blue is invalid');
        }

        $this->blue = $blue;
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    public function equals(Color $color): bool
    {
        return $this->red === $color->getRed() &&
            $this->green === $color->getGreen() &&
            $this->blue === $color->getBlue();
    }

    public static function random(): self
    {
        return new self(rand(0, 255), rand(0, 255), rand(0, 255));
    }

    public function mix(Color $color): self
    {
        return new self(
            (int)(($this->red + $color->getRed()) /2),
            (int)(($this->green + $color->getGreen()) /2),
            (int)(($this->blue + $color->getBlue()) /2)
        );
    }
}

