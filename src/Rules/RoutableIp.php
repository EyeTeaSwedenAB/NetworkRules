<?php

namespace Miken32\Validation\Network\Rules;

use Miken32\Validation\Network\Util;

class RoutableIp extends BaseRule
{
    public function doValidation(string $value, ...$parameters): bool
    {
        return Util::validRoutableIPAddress($value);
    }

    public function message(): string
    {
        return __("The :attribute field must be a valid routable IP address");
    }
}
