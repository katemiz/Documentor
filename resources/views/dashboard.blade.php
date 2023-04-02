<x-app-layout>

    <section class="section container">

        @if ($bina_sayisi == 0)

            <header class="my-6">
                <h1 class="title has-text-weight-light is-size-1">Hoşgeldiniz</h1>
                <h2 class="subtitle has-text-weight-light">{{config('constants.app.welcome_subtitle')}}</h2>
            </header>

            <div class="notification is-warning is-light">Tanımlı bir bina bulunmamaktadır.</div>

            <p>Yapmanız gereken ilk şey, yöneteceğiniz binayı oluşturmak; aşağıdaki bağlantıyı kullanarak ilk binanızın tanımını yapabilirsiniz</p>

            <div class="content">
                <ol>
                    <li>Bina Tanımını Yapınız</li>
                    <li>Bina Sakinlerini Ekleyiniz</li>
                    <li>Bina Parametrelerini belirleyiniz</li>
                    <li>Harcama Kalemlerini Tanımlayınız</li>
                </ol>
            </div>

            <a href="/bina-form" class="button is-link">
                <span class="icon is-small">
                    <x-icon icon="plus" fill="{{config('constants.icons.color.light')}}"/>
                </span>
                <span>Bina Ekle</span>
            </a>

        @endif

        @if ($bina_sayisi == 1)

            <header class="my-6">
                <h1 class="title has-text-weight-light is-size-1">Hoşgeldiniz</h1>
                <h2 class="subtitle has-text-weight-light">{{config('constants.app.welcome_subtitle')}} : Geçerli Bina</h2>
            </header>

            <div class="notification is-success is-light">Şu anda tanımlı tek bir bina olduğundan bundan sonraki tüm işlemler için bu bina kullanılacaktır.</div>

            <div class="notification is-success is-light">{{$bina->name}}</div>


            @if (count($bina->sakinler) < 1 || count($bina->kalemler) < 1)

                <div class="content">
                    <ol>

                        @if (count($bina->sakinler) < 1)
                            <li>Bu bina için tanımlı bina sakini bulunmamaktadır. Buradan Ekleyebilirsiniz</li>
                        @endif

                    </ol>
                </div>

            @else

                <div class="content">
                    Bina ile ilgili, bina sakini, temel bedeller ve harcama türler girilmiştir. Diğer (gelir-gider-fatura) kayıtları girebilirsiniz
                </div>


            @endif

        @endif






{{--

        @if (session('selected_bina'))

        <p>Selected</p>


        <h1 class="title">{{ __('Dashboard') }}</h1>
        <div class="notification is-success">
                    You're logged in!
        </div>

        @endif --}}


    </section>
</x-app-layout>
