@foreach($courses as $course)
	<a href=" {{ route('course.single', ['id' => $course->id]) }}">
		<div style="height:100%;width:100%"> {{ $course->name }}</div>
	</a>
@endforeach