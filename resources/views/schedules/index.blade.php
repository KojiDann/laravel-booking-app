<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>予約一覧</title>
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
       <h1>予約一覧</h1>

       @if($schedules->isNotEmpty())
           @foreach($schedules as $schedule)
               <table>
                <tr>
                    <th>タイトル</th>
                    <th>会議室</th>
                    <th>日</th>
                    <th>開始</th>
                    <th>終了</th>
                </tr>
                <tr>
                   <td>{{ $schedule->title }}</td>
                   <td>{{ $schedule->room_name }}</td>
                   <td>{{ $schedule->day }}</td>
                   <td>{{ $schedule->start }}</td>
                   <td>{{ $schedule->end }}</td>
               </table>
           @endforeach
       @else
           <p>予約はありません。</p>
       @endif
   </main>

   <footer>
       <p>&copy; 予約アプリ All rights reserved.</p>
   </footer>
</body>

</html>
