<?php

namespace App\Livewire;

use App\Models\AppUser;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class Userdata extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return AppUser::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('first_name')
            ->add('last_name')
            ->add('role_id')
            ->add('email_verified_at')
            ->add('password')
            ->add('remember_token')
            ->add('phone_number')
            ->add('email')
            ->add('identity_type')
            ->add('identity_value')
            ->add('birth_date_formatted', fn (AppUser $model) => Carbon::parse($model->birth_date)->format('d/m/Y'))
            ->add('gender')
            ->add('address')
            ->add('city')
            ->add('state')
            ->add('country')
            ->add('status')
            ->add('otp_pin')
            ->add('phone_verified_at')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('First name', 'first_name')
                ->sortable()
                ->searchable(),

            Column::make('Last name', 'last_name')
                ->sortable()
                ->searchable(),

            Column::make('Role id', 'role_id')
                ->sortable()
                ->searchable(),

            Column::make('Email verified at', 'email_verified_at_formatted', 'email_verified_at')
                ->sortable(),

            Column::make('Email verified at', 'email_verified_at')
                ->sortable()
                ->searchable(),

            Column::make('Password', 'password')
                ->sortable()
                ->searchable(),

            Column::make('Remember token', 'remember_token')
                ->sortable()
                ->searchable(),

            Column::make('Phone number', 'phone_number')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Identity type', 'identity_type')
                ->sortable()
                ->searchable(),

            Column::make('Identity value', 'identity_value')
                ->sortable()
                ->searchable(),

            Column::make('Birth date', 'birth_date_formatted', 'birth_date')
                ->sortable(),

            Column::make('Gender', 'gender')
                ->sortable()
                ->searchable(),

            Column::make('Address', 'address')
                ->sortable()
                ->searchable(),

            Column::make('City', 'city')
                ->sortable()
                ->searchable(),

            Column::make('State', 'state')
                ->sortable()
                ->searchable(),

            Column::make('Country', 'country')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Otp pin', 'otp_pin')
                ->sortable()
                ->searchable(),

            Column::make('Phone verified at', 'phone_verified_at_formatted', 'phone_verified_at')
                ->sortable(),

            Column::make('Phone verified at', 'phone_verified_at')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('birth_date'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(AppUser $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }


    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }

}
