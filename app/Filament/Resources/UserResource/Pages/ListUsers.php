<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // public function getTabs(): array
    // {
    //     return [
    //         'Todos' => Tab::make(),
    //         'Ativos' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('status', true)),
    //         'Inativos' => Tab::make()
    //             ->modifyQueryUsing(fn (Builder $query) => $query->where('status', false)),
    //     ];
    // }
}
