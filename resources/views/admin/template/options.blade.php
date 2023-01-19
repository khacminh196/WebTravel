@if (!empty($prefectures))
  @foreach ($prefectures as $key => $item)
    <option value="{{ $item['id'] }}" {{ $select == $item['id'] ? "selected" : '' }}>{{ $item['name'] }}</option>
  @endforeach
@endif
