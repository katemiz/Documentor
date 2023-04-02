<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <link  rel="icon" type="image/svg+xml" href="{{ asset(Config::get('constants.favicon')) }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link  href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <link  href="{{ asset('/css/bulma.css') }}" rel="stylesheet" />
    <script src="{{ asset('/js/js.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/css/sweetalert2_min.css') }}">
    <script src="{{ asset('/js/sweetalert2.min.js') }}"></script>

    <style>
        .pbreak {
            page-break-after: always;
        }
    </style>
  </head>
  <body onload="window.print()">



    {{-- KAPAK SAYFASI --}}
    <div class="section pbreak">

        <h1 class="title has-text-weight-light is-size-1 has-text-left">Akıllı Yönetici / Akıllı Uygulama</h1>
        <h2 class="subtitle has-text-weight-light">{{session('selected_bina')}} Gelir-Gider Durum Dökümü</h2>

        <div class="column card-image has-text-centered">
            <figure class="image">
                <img src="images/kapak.svg" alt="kapak sayfası resmi" >
            </figure>
        </div>

        {{-- <div>
            <h2 class="subtitle has-text-weight-light">{{$bina->name}}</h2>
            <h2 class="subtitle has-text-weight-light">{{$bina->address}}</h2>
            <h2 class="subtitle has-text-weight-light">Bina Sakinleri</h2>


            <table class="table is-fullwidth">
            @foreach ($sakinler as $key => $value)
            <tr>
                <th>Daire {{$key}}</th>
                <td>{{$value}}</td>
            </tr>

            @endforeach
            </table>
        </div> --}}

        <header class="my-1">
            <h1 class="title has-text-weight-light is-size-1 has-text-centered">{{$bina->name}}</h1>
            <h2 class="subtitle has-text-weight-light has-text-centered">{{$bina->address}}</h2>
        </header>

        <h2 class="title has-text-weight-light has-text-centered">{{date('d M Y',time())}}</h2>
        <h2 class="subtitle has-text-weight-light has-text-centered">https://yonetici.kapkara.one</h2>

    </div>


    {{-- OZET --}}
    <div class="section pbreak">

        <header class="my-6">
            <h1 class="title has-text-weight-light is-size-1">Genel Durum</h1>
            <h2 class="subtitle has-text-weight-light">{{session('selected_bina')}}</h2>
        </header>

        <nav class="level my-6 box has-background-grey-light">

            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">TOPLAM GELİR</p>
                    <p class="title has-text-link">{{$ozet->toplam_gelir}} {{$bina->pbirimi}}</p>
                </div>
            </div>

            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">TOPLAM GİDER</p>
                    <p class="title has-text-link">{{$ozet->toplam_gider}} {{$bina->pbirimi}}</p>
                </div>
            </div>

            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">BAKİYE</p>
                    <p class="title has-text-link">{{$ozet->nakit}} {{$bina->pbirimi}}</p>
                </div>
            </div>

        </nav>

        <nav class="level my-6 box has-background-light">

            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">TOPLAM ALACAKLAR</p>
                    <p class="title">{{$ozet->toplam_alacak}} {{$bina->pbirimi}}</p>
                </div>
            </div>

            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">TOPLAM BORÇLAR</p>
                    <p class="title">{{$ozet->toplam_borc}} {{$bina->pbirimi}}</p>
                </div>
            </div>

        </nav>

    </div>


    {{-- GELİRLER --}}
    <div class="section pbreak">

        <header class="my-6">
            <h1 class="title has-text-weight-light is-size-1">Gelirler</h1>
            <h2 class="subtitle has-text-weight-light">{{session('selected_bina')}}</h2>
        </header>

        <table class="table is-fullwidth">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Bina Sakini</th>
                    <th>Açıklama</th>
                    <th class="has-text-right">Tutar</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($gelirler as $key => $gelir)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$gelir->sakin_id ? $sakinler[$gelir->sakin_id] : '' }}</td>
                    <td>{{$gelir->aciklama}}</td>
                    <td nowrap class="has-text-right">{{number_format($gelir->tutar, 2, ',', ' ')}} </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

    {{-- GIDERLER --}}
    <div class="section pbreak">

        <header class="my-6">
            <h1 class="title has-text-weight-light is-size-1">Giderler</h1>
            <h2 class="subtitle has-text-weight-light">{{session('selected_bina')}}</h2>
        </header>

        <table class="table is-fullwidth">

            <thead>
                <tr>
                    <th class="is-narrow">No</th>
                    <th>Açıklama</th>
                    <th class="has-text-right">Tutar</th>
                    <th>Son Ödeme Tarihi</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($giderler as $key => $gelir)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$gelir->aciklama}}</td>
                    <td nowrap class="has-text-right">{{number_format($gelir->tutar, 2, ',', ' ')}} </td>
                    <td>{{$gelir->son_odeme}}</td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

  </body>
</html>
