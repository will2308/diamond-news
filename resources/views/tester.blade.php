{{-- @foreach ($berita as $element) --}}
	{{-- {{ $element->like }} --}}
	{{-- {{ json_decode($element->like)->comment }} --}}
	{{-- @foreach (json_decode($element->like) as $e) --}}
		{{-- {{ $e }} --}}
	{{-- @endforeach --}}
	@php
		// echo json_decode($element->like)->like;
		// foreach ((array)json_decode($element->like, true) as $value) {
		// 	print_r($value);	
		// }
		// $e = json_decode($element->like, true);
		// print_r($e);
		// echo $e['like'];
		// echo $element->like;
		// print_r($element->like);
	@endphp
{{-- @endforeach --}}
{{-- @php
	$a = json_encode('jhdfkhfdk');
	print_r($a);
	$b = json_decode($a);
	echo $b;
	echo $a;
@endphp --}}