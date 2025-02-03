<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Schema;

class CustomerService
{

    public function getPaginatedCustomers(string $searchText = '', int $perPage = 20)
    {
        return $this->searchableCustomerModel($searchText)->paginate($perPage);
    }

    private function searchableCustomerModel(string $searchText = '')
    {
        // Get all column names from the 'customers' table
        $customerColumns = collect(Schema::getColumnListing((new Customer)->getTable()));

        // Define columns that should be excluded from searching
        $exceptedColumns = ['id', 'id_card', 'voters_card', 'drivers_licence', 'created_at', 'updated_at'];

        // Filter out the excluded columns to get the searchable ones
        $searchableColumns = $customerColumns->filter(fn($col) => !in_array($col, $exceptedColumns));

        // Perform a search query on the 'customers' table
        return Customer::where(function ($query) use ($searchableColumns, $searchText) {
            // Loop through each searchable column and apply an OR WHERE condition
            $searchableColumns->each(fn($col) =>  $query->orWhere($col, "like", "%$searchText%"));
        });
    }
}
