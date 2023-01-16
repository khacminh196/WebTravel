@if (!empty($prefectures))
  @foreach ($prefectures as $key => $item)
        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
  @endforeach
@endif
