<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filter;
use App\Models\Filteroption;

class FilterController extends Controller
{
    public function AllFilter()
    {
        $filters = Filter::where('is_deleted', '<>', 1)->get();
        return view('backend.filter.all_filter', compact('filters'));
    }

    public function AddFilter()
    {
        return view('backend.filter.add_filter');
    }

    public function StoreFilter(Request $request)
    {
        $option_name = $request->option_name;

        Filter::insert([

            'filter_title'   => $request->filter_title,
            'is_active'      => $request->is_active,
        ]);

        $id = Filter::where('is_deleted', '<>', 1)->where('filter_title', $request->filter_title)->pluck('id')->first();

        foreach ($option_name as $option) {

            if ($option != null) {

                FilterOption::insert([

                    'filter_id'    => $id,
                    'option_name'  => $option,

                ]);
            }
        }
        return redirect()->route('filter.all')->with('success', 'Filter added');
    }

    public function EditFilter(Request $request)
    {
        $id               = $request->id;
        $filter           = Filter::findOrFail($id);
        $filteroptions    = FilterOption::where('filter_id', $id)->where('is_deleted', '<>', 1)->get();

        return view('backend.filter.edit_filter', compact('filter', 'filteroptions'));
    }

    public function UpdateFilter(Request $request, $id)
    {

        $id        = $request->id;


        Filter::findOrFail($id)->update([

            'filter_title'   => $request->filter_title,
            'is_active'      => $request->is_active,
        ]);

        $option_id   = FilterOption::where('filter_id', $id)->where('is_deleted', '<>', 1)->select('id')->get();

        foreach ($option_id as $option) {

            $opt_id       = $option->id;
            $opt_name     = "option_name_";
            $option_name  = $opt_name . "" . $opt_id;

            FilterOption::findOrFail($option->id)->update([

                'filter_id'      => $id,
                'option_name'    => $request->$option_name,
            ]);
        }

        // new adding


        $option_nam = $request->option_name;


        $idd = Filter::where('is_deleted', '<>', 1)->where('filter_title', $request->filter_title)->pluck('id')->first();

        foreach ($option_nam as $option) {

            if ($option != null) {

                FilterOption::insert([

                    'filter_id'    => $idd,
                    'option_name'  => $option,

                ]);
            } else {

                return redirect()->route('filter.all')->with('success', 'Filter updated');
            }
        }

        return redirect()->route('filter.all')->with('success', 'Filter updated');
    }

    public function DeleteFilterOtion($id)
    {

        $filteroption =  FilterOption::findOrFail($id)->update([

            'is_deleted'  => 1,
        ]);
        return redirect()->back()->with('success', 'FilterOption deleted');
    }

    public function DeleteFilter($id)
    {
        Filter::findOrFail($id)->update([

            'is_deleted'  => 1,
        ]);

        return redirect()->back()->with('success', 'Category Removed');
    }
}
