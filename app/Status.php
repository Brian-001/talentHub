<?php

namespace App;

enum Status: string
{
    //
    case Pending = 'pending';
    case Interview = 'interview';
    case Hired = 'hired';

    

    //Returns a human-readable label for status
    public function label(): string
    {
        return match ($this)
        {
            self::Pending => 'pending',
            self::Interview => 'interview',
            self::Hired => 'hired',
        };
    }

    //Returns dynamic CSS classes for status
    public function color(): string
    {
        return match ($this)
        {
            self::Pending => 'bg-yellow-100 text-yellow-100',
            self::Interview => 'bg-blue-100 text-blue-800',
            self::Hired => 'bg-green-100 text-green-800',

        };
    }

    public function isActive(): bool
    {
        return $this->value === 'active';
    }

    public function isDisabled(): bool
    {
        return $this->value === 'disabled';
    }
}
