<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimetableEntry;
use Illuminate\Validation\Rule;

class TimetableEntryController extends Controller
{
    public function index()
    {
        $timetableEntries = TimetableEntry::orderBy('day')->orderBy('period')->get();
        return view('entries.index', compact('timetableEntries'));
    }

    public function create()
    {
        return view('entries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // 同じ曜日・時限はテーブルの unique 制約で弾かれるので、先にエラーメッセージで知らせる
            'day' => ['required', 'integer', 'between:1,5',
                Rule::unique('timetable_entries')->where('period', $request->input('period'))],
            'period' => ['required', 'integer', 'between:1,5'],
            'title' => ['required', 'string', 'max:255'],
            'room' => ['nullable', 'string', 'max:255'],
        ], [
            'required' => ':attributeを入力してください。',
            'integer' => ':attributeは数字で入力してください。',
            'between' => ':attributeは:minから:maxの間で入力してください。',
            'max' => ':attributeは:max文字以内で入力してください。',
            'day.unique' => 'その曜日・時限にはすでに授業が登録されています。',
        ], [
            'day' => '曜日',
            'period' => '時限',
            'title' => '授業名',
            'room' => '教室',
        ]);

        TimetableEntry::create($validated);

        return redirect('/entries');
    }
}
