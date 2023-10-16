<?php

namespace Miken32\Validation\Network\Rules;

use Miken32\Validation\Network\Util;

class AddressInSubnet extends BaseRule
{
    public function __construct(private ?string $network = null)
    {
    }

    public function doValidation(string $value, ...$parameters): bool
    {
        if ($this->extended) {
            $this->network = $parameters[0] ?? "";
        }

        return Util::addressWithinSubnet($value, $this->network);
    }

    public function message(): string
    {
        return sprintf(
            __('The :attribute field must be a valid IP address within the %s subnet'),
            $this->network ?? __('specified')
        );
    }
}
