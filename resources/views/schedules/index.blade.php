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

        @if (session('flash_message'))
            <p>{{ session('flash_message') }}</p>
        @endif

        @if (session('error_message'))
            <p>{{ session('error_message') }}</p>
        @endif

       @if($schedules->isNotEmpty())
               <table>
                <tr>
                    <th>タイトル</th>
                    <th>会議室</th>
                    <th>日</th>
                    <th>開始</th>
                    <th>終了</th>
                    <th>利用者ID</th>
                    <th>変更</th>
                    <th>キャンセル</th>
                </tr>
                @foreach($schedules as $schedule)
                <tr>
                   <td>{{ $schedule->title }}</td>
                   <td>{{ $schedule->room_name }}</td>
                   <td>{{ $schedule->day }}</td>
                   <td>{{ $schedule->start }}</td>
                   <td>{{ $schedule->end }}</td>
                   <td>{{ $schedule->user_id }}</td>
                   <td>
                        <a href="{{ route('schedules.edit', $schedule) }}">変更</a>
                   </td>
                   <td>
                     <form action="{{ route('schedules.cancel', $schedule)}}" method="POST" onsubmit="return confrim('本当にキャンセルしてよろしいですか？');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">キャンセル</button>
                     </form>
                    </td>
                </tr>
                @endforeach
               </table>
       @else
           <p>予約はありません。</p>
       @endif
   </main>

   <footer>
       <p>&copy; 予約アプリ All rights reserved.</p>
   </footer>
</body>

</html>
