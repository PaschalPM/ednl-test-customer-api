<?php

namespace App\Services;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Exception;
use Illuminate\Support\Facades\Schema;

class CustomerService
{

    public function getPaginatedCustomers(string $searchText = '', int $perPage = 20)
    {
        $data =  $this->searchableCustomerModel($searchText)->paginate($perPage);
        return $data;
    }

    public function store(array $data)
    {
        try {
            $newCustomer = Customer::create($data);
            return $newCustomer;
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function update(Customer $customer, array $data)
    {

        if ($updatedCustomer = $customer->update($data)) {
            return $updatedCustomer;
        } else {
            abort(400, "Failed to update customer");
        }
    }
    private function searchableCustomerModel(string $searchText = '')
    {
        $customerColumns = collect(Schema::getColumnListing((new Customer)->getTable()));

        $exceptedColumns = ['id', 'id_card', 'voters_card', 'drivers_licence', 'created_at', 'updated_at'];

        $searchableColumns = $customerColumns->filter(fn($col) => !in_array($col, $exceptedColumns));

        return Customer::where(function ($query) use ($searchableColumns, $searchText) {
            $searchableColumns->each(fn($col) =>  $query->orWhere($col, "like", "%$searchText%"));
        });
    }
}
