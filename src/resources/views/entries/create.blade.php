<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>授業の登録 | POSSE大学</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">授業の登録</h1>

    @if ($errors->any())
      <ul class="mb-4 text-red-600">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <form method="POST" action="/entries" class="space-y-3">
      @csrf
      <div>
        <label for="day">曜日（1〜5）</label>
        <input type="number" id="day" name="day" min="1" max="5" value="{{ old('day') }}" required class="border">
      </div>
      <div>
        <label for="period">時限（1〜5）</label>
        <input type="number" id="period" name="period" min="1" max="5" value="{{ old('period') }}" required class="border">
      </div>
      <div>
        <label for="title">授業名</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required class="border">
      </div>
      <div>
        <label for="room">教室</label>
        <input type="text" id="room" name="room" value="{{ old('room') }}" class="border">
      </div>
      <button type="submit" class="border px-4 py-1">登録する</button>
    </form>
  </div>
</body>
</html>
