<x-layout>
    @if (isset($error))
        {{ $error }}
    @else
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
    @endif

</x-layout>
