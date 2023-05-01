<x-layout>
     @foreach ($results as $result)
        {{ $result['name'] }}<br>
    @endforeach
</x-layout>