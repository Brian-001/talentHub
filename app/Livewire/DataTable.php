<?php

namespace App\Livewire;

use App\Models\Listing;
use Livewire\Component;

class DataTable extends Component
{
    public $search = '';

    //Applying search filters to the query
    protected function applySearch($query)
    {
        if($this->search === ''){
            return $query; //If no search term return the original query
        }
        return $query
        ->where('full_name', 'like', '%'. $this->search .'%')
        ->orWhere('job_title', 'like', '%'. $this->search .'%');
    }

    public function render()
    {
        //Begin with base query
        $query = Listing::query();

        //Apply search filters
        
        $query = $this->applySearch($query);

        //Paginate the results
        $listings = $query->paginate(10);

        return view('livewire.data-table', ['listings' => $listings]);
    }
}
