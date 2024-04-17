@props(['options'])

<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>{{$slot}}>
<option value="" disabled selected>Please Select</option>   
@foreach($options as $key => $value )
        <option  value="{{ $value->name }}"> {{ $value->name }}</option>
   @endforeach 
    
</select>