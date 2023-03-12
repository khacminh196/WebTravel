@if (!empty($prefectures))
  @foreach ($prefectures as $key => $item)
    <option value="{{ $item['id'] }}" {{ $select == $item['id'] ? "selected" : '' }} {{ in_array($item['id'], $multipleSelects) ? "selected" : "" }}>{{ $item['name'] }}</option>
  @endforeach
@endif
