@extends('nav')
@section('content')
    <section class="flex flex-col items-center mt-4">
        <main>
            <h1 class="text-4xl text-center">Add Notes</h1>
            @if (isset($message))
                <div>{{ $message }}</div>
            @endif
            <div class="mt-3">
               <form action="/createNote" method="POST" class="flex flex-col space-y-2" enctype="multipart/form-data">
                @csrf
                 <input type="text" name="title" placeholder="Title" class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0">
                <textarea name="description" placeholder="Description" value=''
                class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0">
            </textarea>
            <input type="file" name="image"> <br/>
            <input type="hidden" name="student_id" value={{ session('user')->id }}>
                <button class="duration-300 border hover:cursor-pointer text-[#6F7FFE] font-bold py-2 px-3 bg-[#C8CCFC] rounded text-sm hover:bg-white hover:text-black">Add Note</button>
            </form>
            </div>
        </main>


          <main class="mt-8 w-50 mx-auto">
            <h1 class="text-4xl text-center">Your Notes</h1>
            {{-- <div class="mt-3 flex flex-col">
               @if (isset($notes))

                @for ($i = 0; $i < count($notes); $i++)
                <div class="border rounded border-gray-700 p-2">
                    <p>Title: {{ $notes[$i]['title'] }}</p>
                    <p>Description: {{ $notes[$i]['content'] }}</p>
                      <button class="text-black font-bold py-2 px-4 rounded" onclick="window.location.href='/editNote/{{ $notes[$i]['id'] }}'">Edit</button>
            <button class="text-black font-bold py-2 px-4 rounded" onclick="window.location.href='/deleteNote/{{ $notes[$i]['id'] }}'">Delete</button>
            
                    </div>
                    @foreach ($notes as $note) 
                    <img src="{{ asset('image/' . $note->noteimage) }}" alt="image" style="width: 200px"/>
                    @endforeach
                    @endfor

                @endif
            </div> --}}
            <div class="flex flex-wrap justify-center">
    @foreach ($notes as $note)
            
        <div class="bg-gray-100 p-4 m-4 border border-gray-300 rounded-lg shadow-md w-64">
            <h2 class="text-lg font-bold mb-2">{{ $note->title }}</h2>
            <p class="text-gray-600 mb-4">{{ $note->content }}</p>
            <img src="{{ asset('image/' . $note->noteimage) }}" alt="image" class="w-20 h-32 object-cover rounded-lg" style="width: 200px; height: 200px; object-fit: cover;">
            
            <p class="text-gray-500 text-sm">Created at: {{ $note->created_at }}</p>
            <p class="text-gray-500 text-sm">Updated at: {{ $note->updated_at }}</p>
            
        </div>
        @endforeach
</div>
        </main>

    </section>
@endsection