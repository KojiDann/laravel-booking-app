<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>オープンスペース予約一覧</title>

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
       <h1>オープンスペース予約一覧</h1>

        @if (session('flash_message'))
            <p>{{ session('flash_message') }}</p>
        @endif

        @if (session('error_message'))
            <p>{{ session('error_message') }}</p>
        @endif

       @if($bookings->isNotEmpty())
               <table>
                <tr>
                    <th>予約番号</th>
                    <th>開始日</th>
                    <th>開始時間</th>
                    <th>終了日</th>
                    <th>終了時間</th>
                    <th>利用者ID</th>
                    <th>変更</th>
                    <th>キャンセル</th>
                </tr>
                @foreach($bookings as $booking)
                <tr>
                   <td>{{ $booking->id }}</td>
                   <td>{{ $booking->state_date }}</td>
                   <td>{{ $booking->start_time }}</td>
                   <td>{{ $booking->end_date }}</td>
                   <td>{{ $booking->end_time }}</td>
                   <td>{{ $booking->user_id }}</td>
                   <td>
                        <a href="{{ route('bookings.edit', $booking->id) }}">変更</a>
                   </td>
                   <td>
                     <form action="{{ route('bookings.cancel', $booking)}}" method="POST" onsubmit="return confirm('本当にキャンセルしてよろしいですか？');">
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

       <a href='/laravel-booking-app/public/bookings/create'>オープンスペースを予約する</a>
       <a href='/laravel-booking-app/public/mypage'>マイページに戻る</a>
   </main>

   <footer>
       <p>&copy; 予約アプリ All rights reserved.</p>
   </footer>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
