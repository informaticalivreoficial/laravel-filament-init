<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class TimeResource extends ListRecords
{
    protected static string $resource = UserResource::class;
    
    
    

    public static function getEloquentQuery() : Builder
    {
        return User::orderBy('created_at', 'DESC')
                ->where('client', 0)
                ->orderBy('status', 'ASC');
    }
}
