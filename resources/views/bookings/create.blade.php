<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>オープンスペース予約</title>

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
        <h1>オープンスペース予約（時間利用）</h1>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div>
                <label for="start_date">日付</label>
                <input type="date" value="2026-01-01" name="start_date">
            </div>
            <div>
                <label for="start_time">開始時間</label>
                <input type="time" name="start_time">
            </div>
            {{--
            <div>
                <label for="end_date">終了日</label>
                <input type="date" value="2026-01-01" name="end_date">
            </div>
            --}}
            <div>
                <label for="end_time">終了時間</label>
                <input type="time" name="end_time">
            </div>
            <div>
                <button type="submit">予約する</button>
            </diV>
        </form>

        <h1>オープンスペース予約（終日利用）</h1>
        <form action="{{ route('bookings.onedayStore') }}" method="POST">
            @csrf
            <div>
                <label for="start_date">日付</label>
                <input type="date" value="2026-01-01" name="start_date">
            </div>
            {{--
            <div>
                <label for="start_time">開始時間</label>
                <input type="time" name="start_time">
            </div>
            <div>
                <label for="end_date">終了日</label>
                <input type="date" value="2026-01-01" name="end_date">
            </div>
            <div>
                <label for="end_time">終了時間</label>
                <input type="time" name="end_time">
            </div>
            --}}
            <div>
                <button type="submit">予約する</button>
            </diV>
        </form>

       <a href='/laravel-booking-app/public/mypage'>戻る</a>
   </main>

   <footer>
       <p>&copy; 予約アプリ All rights reserved.</p>
   </footer>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
