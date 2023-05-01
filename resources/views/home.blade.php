<x-layout>

    <div class="row justify-content-start gy-5" style="margin-bottom: 50px; margin-top: 25px;"">
        <div class="col-4">
            <form action="/search" method="POST">
                <div class="mb-3">
                    <label for="characterName" class="form-label">Character Name</label>
                    <input class="form-control" type="text" name="name" id="characterName" required />
                </div>
                <button class="btn btn-primary" type="submit">Search Characters</button>
                @csrf
            </form>
        </div>
    </div>

    <div class="row gy-5">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>Character Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>
                            <a href="/character/{{ $result['id'] }}">
                                {{ $result['name'] }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $pagination }}
</x-layout>
