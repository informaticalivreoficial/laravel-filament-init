<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;

class PostalCode extends TextInput
{
    public function viaCep(): static
    {
        $this->mask('99.999-999')->minLength(9);
        return $this;
    }
}
