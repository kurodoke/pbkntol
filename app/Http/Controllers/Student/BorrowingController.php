<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreBorrowingRequest;
use App\Models\Borrowing;
use App\Models\Item;
use App\Models\Subject;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowings = Borrowing::with('student:id,identification_number,name', 'item:id,name')
            ->select('id', 'item_id', 'student_id', 'validated', 'date', 'time_start', 'time_end')
            ->whereDate('date', now())->where('student_id', auth()->id())
            ->orderBy('date', 'DESC')
            ->get();

        $itemProgress = Borrowing::select('item_id', 'date', 'time_end')
            ->whereDate('date', now())->whereNull('time_end')
            ->orderBy('date', 'DESC')
            ->get();

        $subjects = Subject::select('id', 'name')->get();

        $itemsCanBorrowed = Item::select('id', 'name')
            ->whereNotIn('id', $itemProgress->pluck('item_id'))->get();
        $itemsCannotBeBorrowed = Item::select('id', 'name')
            ->whereIn('id', $itemProgress->pluck('item_id'))->get();

        return view('student.borrowing.main.index', compact(
            'borrowings',
            'itemsCanBorrowed',
            'itemsCannotBeBorrowed',
            'subjects'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBorrowingRequest $request)
    {
        $validated = $request->safe()->merge(['student_id' => auth('student')->id()]);
        Borrowing::create($validated->toArray());

        return redirect()->route('students.borrowings.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        $borrowing->update($request->all());

        return redirect()->route('students.borrowings.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Returning borowing by changing the is_return status column.
     */
    public function returnBorrowing(Request $request, Borrowing $borrowing)
    {
        $borrowing->update([
            'note' => $request->note,
            'time_end' => now(),
        ]);

        return redirect()->back()->with('success', 'Status berhasil diubah!');
    }
}
