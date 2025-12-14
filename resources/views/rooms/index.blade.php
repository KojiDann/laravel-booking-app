<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laravel-booking-app</title>

   {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" >

</head>

<body>
   <table>
       <tr>
           <th>ID</th>
           <th>会議室名</th>
           <th>価格/時</th>
           <th>予約</th>
       </tr>
       @foreach($rooms as $room)
           <tr>
               <td>{{ $room->id }}</td>
               <td>{{ $room->room_name }}</td>
               <td>{{ $room->price }}</td>
               <td>
                    <a href={{ route('schedules.create')}}>予約</a>
                </td>
           </tr>
       @endforeach
   </table>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
