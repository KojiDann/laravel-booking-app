<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laravel-booking-app</title>
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
                    <a href={{ route('shcedules.create')}}>予約</a>
                </td>
           </tr>
       @endforeach
   </table>
</body>

</html>
