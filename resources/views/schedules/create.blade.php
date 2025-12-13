<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>予約</title>
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
        <h1>予約</h1>
        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf
            <diV>
                <label for="title">タイトル</label>
                <input type="text" id="title" name="title">
            </diV>
            <div>
                <label for="room_name">会議室選択</label>
                <select>
                    <option>会議室A</option>
                    <option>会議室B</option>
                    <option>会議室C</option>
                    <option>会議室D</option>
                </select>
            </div>
            <div>
                <label for="start">開始時間</label>
                <input type="time">
            </div>
            <div>
                <label for="start">終了時間</label>
                <input type="time">
            </div>
            <div>
                <button type="submit">予約する</button>
            </diV>
        </form>
       <a href='/laravel-booking-app/public/rooms'>戻る</a>
   </main>

   <footer>
       <p>&copy; 予約アプリ All rights reserved.</p>
   </footer>
</body>

</html>
