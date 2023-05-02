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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (isset($error))
        {{ $error }}
    @else
        <div class="row gy-5">
            <table class="table table-striped">
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
    @endif
</x-layout>
