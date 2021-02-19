@extends('layout.main')
@section('content')
    @foreach ($data['posts'] as $item)
        @component('components.post_card_h', ['data' => $item])@endcomponent
    @endforeach
    @component('components.pagination', ['data' => $data['pagination']])@endcomponent

@endsection
