<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    // Customize properties or methods here
    protected static ?string $navigationIcon = 'phosphor-gauge-duotone';

    public function getHeading(): string
    {
        $company = "Glory Tape";
        return "{$company}'s Dashboard";
    }
}
