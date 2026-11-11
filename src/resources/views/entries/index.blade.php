<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>わたしの時間割づくり | POSSE大学</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">わたしの時間割づくり</h1>
    <table class="min-w-full bg-white">
      <thead>
        <tr>
            <th>曜日</th>
            <th>時限</th>
            <th>授業名</th>
            <th>教室</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($timetableEntries as $entry)
            <tr>
                <td>{{ $entry->day }}</td>
                <td>{{ $entry->period }}</td>
                <td>{{ $entry->title }}</td>
                <td>{{ $entry->room }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">まだ授業が登録されていません。</td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>
</body>
</html>
