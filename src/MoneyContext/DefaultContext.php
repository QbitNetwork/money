<?php

namespace Brick\Money\MoneyContext;

use Brick\Money\Currency;
use Brick\Money\MoneyContext;

use Brick\Math\BigNumber;
use Brick\Math\RoundingMode;

/**
 * Adjusts the scale of the result to the default scale for the currency in use.
 */
class DefaultContext implements MoneyContext
{
    /**
     * @var int
     */
    private $roundingMode;

    /**
     * @param int $roundingMode
     */
    public function __construct($roundingMode = RoundingMode::UNNECESSARY)
    {
        $this->roundingMode = (int) $roundingMode;
    }

    /**
     * {@inheritdoc}
     */
    public function applyTo(BigNumber $amount, Currency $currency, $currentScale)
    {
        return $amount->toScale($currency->getDefaultFractionDigits(), $this->roundingMode);
    }
}
