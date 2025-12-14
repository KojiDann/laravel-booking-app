<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>マイページ</title>

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
        <div>
            <img>
            <img>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td>
                            <a href='/laravel-booking-app/public/rooms'>会議室</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href='/laravel-booking-app/public/schedules/create'>予約する</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href='/laravel-booking-app/public/schedules/index'>予約一覧</a>
                        </td>
                    </tr>


                </table>

            </div>
            <div class="col-md-8">

            </div>
        </div>
    </div>


   <footer>
       <p>&copy; 予約アプリ All rights reserved.</p>
   </footer>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
