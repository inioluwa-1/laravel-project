@extends('nav')

@section('content')
    <section class="flex flex-col items-center mt-4">
        <main>
            <h1 class="text-4xl text-center">Edit Note</h1>
            <div class="mt-3">
                <form action="/updateNote/{{ $note->id }}" method="POST" class="flex flex-col space-y-2">
                    @csrf
                    <input type="text" name="title" value="{{ $note->title }}" placeholder="Title" class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0">
                    <textarea name="description" placeholder="Description" value="{{ $note->content }}"
                              class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0">
                    </textarea>
                    <button class="duration-300 border hover:cursor-pointer text-[#6F7FFE] font-bold py-2 px-3 bg-[#C8CCFC] rounded text-sm hover:bg-white hover:text-black">Update Note</button>
                </form>
            </div>
        </main>
    </section>
@endsection