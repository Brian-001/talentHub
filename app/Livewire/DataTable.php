<?php

namespace App\Livewire;

use App\Status;
use App\Models\Listing;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Controllers\ListingController;

class DataTable extends Component
{
    use WithPagination;

    //Property to hold search input
    public $search = '';
    

    public $statusFilter = '';

    //Resetting the page when search is updated
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function getStatusClasses($status): string
    {
        //Convert the string $status to corresponding status enum

        $statusEnum = Status::tryFrom($status);


        //Return the dynamic CSS classes for status
        return $statusEnum ? $statusEnum->color() : 'bg-gray-100 text-gray-800';
        
    }

    public function getMenuItemsProperty()
    {
        return collect(Status::cases())->map(function (Status $status){
            return[
                'label' => $status->label(),
                'action' => $status->name,
                'classes' => $status->color(), //Dynamic CSS classes
                'isActive' => $status->isActive(),
                'isDisabled' => $status->isDisabled(),
            ];
        })->toArray();
    }
    public function updateStatus($listingId, $status)
    {
        //convert the string action back to enum
        $statusEnum = Status::tryFrom($status);

        if(!$statusEnum){
            throw new \InvalidArgumentException('Invalid ststus: $status');
        }

        $listing = Listing::findOrFail($listingId);
        $listing->update(['status' => $statusEnum->value]);
    }

    protected function callControllerMethod($method, $params = [])
    {
        return app(ListingController::class)->$method(...$params);
    }

    //Applying search filters to the query
    protected function applySearch($query)
    {
        if($this->search !== ''){
            $query->where(function ($q){
                $q->where('full_name', 'like', '%'. $this->search .'%')
                ->orwhere('nationality', 'like', '%'. $this->search .'%')
                ->orWhere('job_title', 'like', '%'. $this->search .'%')
                ->orWhere('status', 'like', '%'. $this->search .'%');
            });
            
        }
        
        return $query;
    }

    public function render()
    {
        //Begin with base query
        $query = Listing::query();

        //Apply search filters
        
        $query = $this->applySearch($query);

        //Paginate the results
        $listings = $query->paginate(4);
        

        return view('livewire.data-table', ['listings' => $listings]);
    }
}
