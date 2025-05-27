{{-- @extends('nav')
@section('content')
<div class="col-6 mx-auto shadow">
    <h1>Notes</h1>
    </div> 
    @endsection    --}}


@extends('nav')
@section('content')
    <section class="flex flex-col items-center mt-4">
        <main>
            <h1 class="text-4xl text-center">Add Notes</h1>
            @if (isset($message))
                <div>{{ $message }}</div>
            @endif
            <div class="mt-3">
               <form action="/createNote" method="POST" class="flex flex-col space-y-2">
                @csrf
                 <input type="text" name="title" placeholder="Title" class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0">
                <textarea name="description" placeholder="Description" value=''
                class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0"
                >
                
            </textarea>
            <input type="hidden" name="student_id" value={{ session('user')->id }}>
                <button class="duration-300 border hover:cursor-pointer text-[#6F7FFE] font-bold py-2 px-3 bg-[#C8CCFC] rounded text-sm hover:bg-white hover:text-black">Add Note</button>
            </form>
            </div>
        </main>


          <main class="mt-8 w-50 mx-auto">
            <h1 class="text-4xl text-center">Your Notes</h1>
            <div class="mt-3 flex flex-col">
               @if (isset($notes))

                @for ($i = 0; $i < count($notes); $i++)
                <div class="border rounded border-gray-700 p-2">
                    <p>Title: {{ $notes[$i]['title'] }}</p>
                    <p>Description: {{ $notes[$i]['content'] }}</p>
                    {{-- Edit Button --}}
                        <button class="text-black font-bold py-2 px-4 rounded" onclick="window.location.href='/editNote/{{ $notes[$i]['id'] }}'">Edit</button>
                        {{-- Delete Button --}}
                        <button class="text-black font-bold py-2 px-4 rounded" onclick="window.location.href='/deleteNote/{{ $notes[$i]['id'] }}'">Delete</button>
                    </div>
                    @endfor

                @endif
            </div>
        </main>

    </section>
@endsection