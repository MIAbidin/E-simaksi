<div class="container py-5">
    <h1 class="text-center">Popular Hiking Trails</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 py-5">

        @foreach ($trails as $trail)
        <a href="/jalur" class="no-underline">
            <div class="col">
                <div class="card">
                    <img src="img/gogik.png" class="card-img-top" alt="...">
                    <div class="card-body" style="text-align: left;">
                        <h4 class="card-title">{{ $trail->name }}</h4>
                        <p class="card-text">Address: {{ $trail->address }}</p>
                    </div>
                </div>
            </div>
        </a>
        @endforeach   
    </div>

    <div class="text-center">
        @if ($count < $totalTrails)
            <button class="btn btn-primary mx-auto" wire:click="loadmore">Load More</button>
        @endif
        <span wire:loading>Loading..</span>
    </div>
</div>
