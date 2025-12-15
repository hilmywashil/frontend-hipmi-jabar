@extends('layouts.app')

@section('title', 'Nama Anggota - Buku Informasi Anggota HIPMI Jawa Barat')

@section('content')
    <section class="page-banner-2">
        <div class="detail-katalog-info">
            <a href="{{ route('buku-anggota') }}" class="fa fa-arrow-left back-button"></a>
            <h1>Nama Anggota</h1>
            <p>Jabatan Anggota</p>
            <br>
            <div class="detail-katalog-contact">
                <div>
                    <div class="footer-item-child">
                        <i class="fa fa-map-marker footer-social-icons"></i>
                        <p>Jl. Terusan Mars Utara III No.8D, Manjahlega, Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40267
                        </p>
                    </div>
                    <div class="footer-item-child">
                        <i class="fa fa-phone footer-social-icons"></i>
                        <p>0857-2303-6868</p>
                    </div>
                    <div class="footer-item-child">
                        <i class="fa fa-envelope footer-social-icons"></i>
                        <p>marketing@cyberlabs.co.id</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-katalog-photo">
            <img src="{{ asset('images/photo.jpg') }}" alt="">
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
        <img src="{{ asset('images/example (1).png') }}" alt="">
        <img src="{{ asset('images/example (1).png') }}" alt="">
    </section>


@endsection