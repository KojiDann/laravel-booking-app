<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>予約変更</title>

   {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" >

</head>

<body>
   <header>
       <nav>
           <ul>
               <li>
                   <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST">
                       @csrf
                   </form>
               </li>
           </ul>
       </nav>
   </header>

   <main>
        <h1>予約変更</h1>
        <form action="{{ route('schedules.update', $schedule) }}" method="POST">
            @csrf
            @method('PATCH')

            <diV>
                <label for="title">タイトル</label>
                <input type="text" id="title" name="title" value="{{ old('title', $schedule->title) }}">
            </diV>
            <div>
                <label for="room_name">会議室選択</label>
                <select name="room_name" value="{{ old('room_name', $schedule->room_name) }}">
                    <option>会議室A</option>
                    <option>会議室B</option>
                    <option>会議室C</option>
                    <option>会議室D</option>
                </select>
            </div>
            <div>
                <label for="day">日付</label>
                <input type="date" value="{{ old('day', $schedule->day) }}" name="day">
            </div>
            <div>
                <label for="start">開始時間</label>
                <input type="time" name="start"  value="{{ old('start', $schedule->start) }}">
            </div>
            <div>
                <label for="start">終了時間</label>
                <input type="time" name="end"  value="{{ old('end', $schedule->end) }}">
            </div>
            <div>
                <button type="submit">変更する</button>
            </diV>
        </form>
       <a href='/laravel-booking-app/public/rooms'>戻る</a>
   </main>

   <footer>
       <p>&copy; 予約アプリ All rights reserved.</p>
   </footer>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
