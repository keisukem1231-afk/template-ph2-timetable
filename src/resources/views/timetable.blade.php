<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>わたしの時間割づくり | POSSE大学</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen">
  <main class="max-w-5xl mx-auto px-4 py-6">
    <div class="grid gap-6 md:grid-cols-2">

      {{-- 区画1：月曜日の授業 --}}
      <section class="min-w-0 bg-white border border-slate-200 rounded-lg">
        <div class="px-5 pt-4 pb-3 border-b border-slate-200">
          <h2 class="text-base font-bold"><span class="text-slate-500 mr-2">区画1</span>月曜日の授業</h2>
        </div>
        <table class="w-full text-sm text-left text-slate-700">
          <thead class="bg-slate-50 text-slate-600">
            <tr>
              <th class="px-4 py-2">時限</th>
              <th class="px-4 py-2">授業名</th>
              <th class="px-4 py-2">担当教員</th>
              <th class="px-4 py-2">教室</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($section1 as $course)
              <tr class="border-t border-slate-200">
                <td class="px-4 py-2">{{ $course->period }}</td>
                <td class="px-4 py-2">{{ $course->name }}</td>
                <td class="px-4 py-2">{{ $course->teacher }}</td>
                <td class="px-4 py-2">{{ $course->room }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </section>

      {{-- 区画2：必修科目 --}}
      <section class="min-w-0 bg-white border border-slate-200 rounded-lg">
        <div class="px-5 pt-4 pb-3 border-b border-slate-200">
          <h2 class="text-base font-bold"><span class="text-slate-500 mr-2">区画2</span>必修科目</h2>
        </div>
        <table class="w-full text-sm text-left text-slate-700">
          <thead class="bg-slate-50 text-slate-600">
            <tr>
              <th class="px-4 py-2">授業名</th>
              <th class="px-4 py-2">単位数</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($section2 as $course)
              <tr class="border-t border-slate-200">
                <td class="px-4 py-2">{{ $course->name }}</td>
                <td class="px-4 py-2">{{ $course->credits }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </section>

    </div>
  </main>
</body>
</html>