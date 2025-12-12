@extends('layouts.app')

@section('title', 'Nama Perusahaan - E-Katalog HIPMI Jawa Barat')

@section('content')


    <section class="page-banner-2">
        <div class="detail-katalog-info">
            <a href="{{ route('e-katalog') }}" class="fa fa-arrow-left back-button"></a>
            <h1>CyberLabs ( PT. Laskar Teknologi Mulia )</h1>
            <p>Bidang Perusahaan</p>
        </div>
        <div class="detail-katalog-logo">
            <img src="{{ asset('images/cyberlabs.png') }}" alt="">
        </div>
    </section>
    <section class="detail-katalog-text">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat ac felis sit amet commodo. Vivamus a
            lacus in eros molestie malesuada. Curabitur felis enim, imperdiet at interdum ut, hendrerit a nulla. Nunc id
            tempor eros. In quis aliquam urna. Etiam eget dui eu purus condimentum varius. Vestibulum eleifend rhoncus
            bibendum. Donec pharetra orci ut turpis porta, a euismod nulla aliquam. Aenean feugiat eros a fringilla finibus.

            Donec finibus, metus ac venenatis auctor, lacus dui convallis nisl, eget convallis felis sapien vitae nunc. Sed
            sit amet massa id diam venenatis rutrum in id tellus. Morbi volutpat vehicula odio, a rutrum orci porttitor sed.
            Nunc imperdiet pretium auctor. In at nisl ac magna imperdiet mollis. Quisque neque sapien, auctor quis pretium
            non, tempus a ligula. Nulla facilisi.

            Nam sed turpis nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. In hac habitasse platea
            dictumst. Vivamus at euismod ex. Suspendisse potenti. Integer id lectus lorem. Aliquam vitae sem ex. Nam
            efficitur augue in mauris efficitur euismod. Proin dapibus sollicitudin dui, vitae eleifend magna sollicitudin
            non. Nam non mi vitae odio lobortis suscipit venenatis mollis urna. In cursus tempor nibh. Donec condimentum
            ipsum turpis, vehicula vehicula tortor fermentum eu. Nam rhoncus nunc ac sagittis dictum. Praesent facilisis
            diam dui, eu faucibus ante sagittis non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum
            ullamcorper luctus rutrum.

            Aliquam malesuada dui sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus
            mus. Vestibulum eu scelerisque metus. In cursus nulla ex, vel vehicula lectus tristique sed. Phasellus porta
            ornare tellus sit amet dignissim. Maecenas eleifend convallis odio. Aenean commodo pharetra ipsum, et commodo
            sapien varius eu. Quisque et aliquam neque. Maecenas eu elit quis lacus blandit consectetur. Etiam nec nisi at
            justo suscipit ornare vitae congue justo. Ut non malesuada leo. Morbi ante metus, congue sit amet dui vitae,
            volutpat posuere erat. Proin at ipsum fermentum, fringilla dolor ut, dapibus justo.

            Ut aliquet velit vitae est gravida consectetur. Sed venenatis, sem id tempor semper, magna ipsum porta lorem, ac
            mattis tellus risus eget risus. Praesent nec semper nunc. Cras eget elementum augue, a sodales elit. Nulla
            luctus placerat urna, sed pulvinar felis faucibus sit amet. Interdum et malesuada fames ac ante ipsum primis in
            faucibus. Quisque scelerisque, leo non rhoncus feugiat, lectus neque porttitor dolor, a varius mauris erat ac
            nunc. Duis feugiat egestas rhoncus.</p>
    </section>
    <section class="detail-katalog-images">
        <img src="{{ asset('images/example (1).png') }}" alt="">
        <img src="{{ asset('images/example (2).png') }}" alt="">
        <img src="{{ asset('images/example (3).png') }}" alt="">
    </section>
    <section class="detail-katalog-contact-map">
        <div class="detail-katalog-contact">
            <h1>Kontak</h1>
            <div>
                <div class="footer-item-child">
                    <i class="fa fa-map-marker footer-social-icons"></i>
                    <p>Jl. Lombok No.10 Lantai 2, Merdeka, Kec. Sumur Bandung, Kota Bandung, Jawa Barat
                        40113</p>
                </div>
                <div class="footer-item-child">
                    <i class="fa fa-phone footer-social-icons"></i>
                    <p>0857 2303 6868</p>
                </div>
                <div class="footer-item-child">
                    <i class="fa fa-envelope footer-social-icons"></i>
                    <p>marketing@cyberlabs.co.id</p>
                </div>
            </div>

        </div>
        <div class="detail-catalog-contact">
            <iframe class="map-embed"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.13970449806!2d107.66334356961956!3d-6.9432100682961355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7c381e3c323%3A0x5f5160f6c9796e4b!2sCYBERLABS%20-%20Jasa%20Digital%20Marketing%20%7C%20Jasa%20Pembuatan%20Website%20%7C%20Jasa%20Pembuatan%20Aplikasi!5e0!3m2!1sid!2sid!4v1765528960501!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>
@endsection