@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Menu Makanan', 'titleSub' => 'Customer : '])
    <div class="container">
    <!-- Card -->
    <div class="card mb-3">
        <img src="{{ asset('storage/' . $daftar_makanan['gambar_makanan']) }}" class="card-img-top h-20" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $daftar_makanan['nama_makanan'] }}</h5>
            <p class="card-text"><small class="text-muted">Rp. {{ $daftar_makanan['harga_makanan'] }}</small></p>
            <p class="card-text">{{ $daftar_makanan['deskripsi_makanan'] }}</p>
            <h1 class="font-sans text-sm text-gray-900 leading-8">Quantitiy</h1>
            <p class="py-2 px-3 text-sm m-0" id="qty" data-object="{{ json_encode($daftar_makanan) }}">1</p>
            <button class="btn btn-lg btn-danger" id="minusBtn">-</button>
            <button class="btn btn-lg btn-success" id="plusBtn">+</button>
            <button id="addCartBtn" type="submit" class="btn btn-lg btn-info btn-lg w-100 mt-4 mb-0">Add to Cart</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    function docReady(fn) {
        if (document.readyState === "complete" || document.readyState === "interactive") {
            fn;
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(() => {
        const plusBtn = document.getElementById('plusBtn');
        const minusBtn = document.getElementById('minusBtn');
        const qty = document.getElementById('qty');
        const addCartBtn = document.getElementById('addCartBtn');
        const csrf = document.querySelector("meta[name='csrf-token']")
        plusBtn.addEventListener('click', function() {
            qty.innerHTML = Number(qty.innerHTML) + 1
        });

        minusBtn.addEventListener('click', function() {
            if (Number(qty.innerHTML) == 0) return;
            qty.innerHTML = Number(qty.innerHTML) - 1
        });
        addCartBtn.addEventListener('click', function(e) {
            e.target.disabled = true;
            addToCart();
        })

        async function addToCart() {
            data = {
                ...JSON.parse(qty.dataset.object),
                quantity: qty.innerHTML,
                _token: csrf.getAttribute('content'),
            }
            await $.ajax({
                url: '../addToCart',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: (route) => {
                    window.location.href = '..' + route;
                }
            });
        }
    })
</script>

@endsection
