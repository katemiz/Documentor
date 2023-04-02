<x-app-layout>

    <section class="section container">

        <div class="columns">

            <div class="column is-half">
                <h1 class="title has-text-weight-light is-size-1 has-text-left">Documentor</h1>

                <figure class="image is-1by1">
                    <img src="images/hero.svg" alt="The Process Flow" on:click="{showImg}">
                </figure>
            </div>

            <div class="column content">

                <h1 class="subtitle has-text-weight-light">Documentation in HTML</h1>

                <p class="mb-3">Bu uygulama ile tüm apartman/site yöneticleri tüm verilerini ve bütçelerini zorlanmadan yönetebilmesi amacıyla hazırlanmıştır.</p>

                <p class="mb-3">Uğraşmadan :</p>

                <ul>
                    <li>Aidat Yönetimi
                        <ul>
                            <li>Aidatların Formalarının Hazırlanması</li>
                            <li>Aidatların Ödendi/Ödenmedi Kaydı</li>
                            <li>Aidatların Bilgilerinin kişilere gönderilmesi</li>
                        </ul>
                    </li>

                    <li>Harcama Yönetimi (Fatura)

                        <ul>
                            <li>Doğalgaz</li>
                            <li>Elektrik</li>
                            <li>Su/Sıcak Su</li>
                            <li>Bakım/Tamirat vb</li>
                        </ul>
                    </li>

                    <li>Karar Yönetimi

                        <ul>
                            <li>Kararların Takibi/Tutulması</li>
                            <li>Kararların Bildirimi</li>
                        </ul>
                    </li>
                </ul>

            </div>

        </div>

        <div class="column">
            <h1 class="title has-text-weight-light is-size-1 has-text-left">Relationships</h1>

            <figure class="image">
                <img src="images/relationships.png" alt="The Process Flow" on:click="{showImg}">
            </figure>
        </div>


    </section>

</x-app-layout>

