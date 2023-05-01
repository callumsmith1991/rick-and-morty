<x-layout>
    <form action="/search" method="POST">
        <input type="text" name="name" required />
        <button type="submit">Search Characters</button>
        @csrf
    </form>
    @foreach ($results as $result)
        {{ $result['name'] }}<br>
    @endforeach
    {{ $pagination }}
</x-layout>
