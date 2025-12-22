<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ホームページ</title>

     {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" >

</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar">
                <a class="navbar-brand" href="/laravel-booking-app/public/homepage">
                    <img src="{{ asset('img/logo.png')}}" alt="ロゴ">
                </a>
                <ul class="nav nav-underline" id="headerTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link text-body-emphasis" id="findRoom-tab" data-bs-toggle="tab" data-bs-target="#findRoom-tab-pane" type="button" aria-controls="findRoom-tab-pane">
                            <i class="bi bi-map"></i>
                            店舗を探す
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link text-body-emphasis" id="howToUse-tab" data-bs-toggle="tab" data-bs-target="#howToUse-tab-pane" type="button" aria-controls="howToUse-tab-pane">
                            <i class="bi bi-phone"></i>
                            利用方法
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link text-body-emphasis" id="headerPrice-tab" data-bs-toggle="tab" data-bs-target="#headerPrice-tab-pane" type="button" aria-controls="headerPrice-tab-pane">
                            <i class="bi bi-currency-yen"></i>
                            料金
                        </button>
                    </li>
                </ul>
                <a href='/laravel-booking-app/public/mypage'>
                    <button type="button" class="btn btn-outline-success">
                            マイページ
                    </button>
                </a>
            </nav>
        </header>
    </div>

    <div id="intentionalSpace">space</div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 photo-frame-left" style="height: 500px">
                <img src="{{ asset('img/inside-1.jpg')}}" class="img-fluid" alt="会議室内観1">
            </div>
            <div class="col-md-6" style="height: 500px">
                <div class="row">
                    <div class="col-md-6 photo-frame-right" style="height: 250px">
                        <img src="{{ asset('img/inside-2.jpg')}}" class="img-fluid" alt="会議室内観2">
                    </div>
                    <div class="col-md-6 photo-frame-right" style="height: 250px">
                        <img src="{{ asset('img/inside-3.jpg')}}" class="img-fluid" alt=会議室内観3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 photo-frame-right" style="height: 250px">
                        <img src="{{ asset('img/inside-4.jpg')}}" class="img-fluid" alt="会議室内観2">
                    </div>
                    <div class="col-md-6 photo-frame-right" style="height: 250px">
                        <img src="{{ asset('img/inside-5.jpg')}}" class="img-fluid" alt=会議室内観3>
                    </div>
                </div>
            </div>
        </div>

            <ul class="nav nav-underline" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-body-emphasis active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" aria-controls="overview-tab-pane" aria-selected="true">概要</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-body-emphasis" id="price-tab" data-bs-toggle="tab" data-bs-target="#price-tab-pane" type="button" aria-controls="price-tab-pane" aria-selected="false">プラン・料金</button>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-body-emphasis" id="booking-tab" data-bs-toggle="tab" data-bs-target="#booking-tab-pane" type="button" aria-controls="booking-tab-pane" aria-selected="false">予約（個室・会議室）</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-body-emphasis" id="access-tab" data-bs-toggle="tab" data-bs-target="#access-tab-pane" type="button" aria-controls="access-tab-pane" aria-selected="false">アクセス</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-body-emphasis" id="review-tab" data-bs-toggle="tab" data-bs-target="#review-tab-pane" type="button" aria-controls="review-tab-pane" aria-selected="false">レビュー</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-body-emphasis" id="monthly-tab" data-bs-toggle="tab" data-bs-target="#monthly-tab-pane" type="button" aria-controls="monthly-tab-pane" aria-selected="false">月額プラン</a>
                </li>
            </ul>

        <div class="tab-content tab-space" id="myTabContent">
            <div class="tab-pane fade show active tab-frame" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                {!! nl2br(e($overview)) !!}
            </div>
            <div class="tab-pane fade tab-frame" id="price-tab-pane" role="tabpanel" aria-labelledby="price-tab" tabindex="0">
                <div class="row">
                    <div class="col-md-4">
                        <h6>時間課金で今すぐ使える</h6>
                        <h3>ドロップイン</h3>
                    </div>
                    <div class="col-md-8">
                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <P>料金：1時間400円</P>
                                </div>
                                <div class="col-md-6">
                                    <a href='/laravel-booking-app/public/bookings/create' class="btn btn-outline-success">
                                        予約する
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>１DAY利用：2,000円</p>
                                </div>
                                <div class="col-md-6">
                                    <a href='/laravel-booking-app/public/bookings/create' class="btn btn-outline-success">
                                        購入する
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="booking-tab-pane" role="tabpanel" aria-labelledby="booking-tab" tabindex="0">
                予約の説明
            </div>
            <div class="tab-pane fade" id="access-tab-pane" role="tabpanel" aria-labelledby="access-tab" tabindex="0">
                アクセスの説明
            </div>
            <div class="tab-pane fade" id="review-tab-pane" role="tabpanel" aria-labelledby="review-tab" tabindex="0">
                レビュー
            </div>
            <div class="tab-pane fade" id="monthly-tab-pane" role="tabpanel" aria-labelledby="monthly-tab" tabindex="0">
                月額プランの説明
            </div>
        </div>

        <footer>
            <p>&copy; 予約アプリ All rights reserved.</p>
        </footer>

        {{-- Bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </div>
</body>

</html>
