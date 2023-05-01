<x-layout>
    <div class="row">
        <div class="col-4">
            <a class="btn btn-primary" href="/">Back</a>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <img class="card-img-top" src="{{ $image }}" />
            <h5 class="card-title">{{ $name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $species }}</h6>
            <h5>Episodes Appeared in:</h5>
            @foreach ($episodes as $episode)
                {{ $episode }}
                <br>
            @endforeach
        </div>
    </div>
</x-layout>
