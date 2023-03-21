@extends('layouts.app')


@section('content')
    <h1 class="text-2xl text-center"> Test Import With Laravel Excel</h1>

        @csrf
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <x-nav-bar />

        <form action="{{ route('importWithLaravelExcel.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- content --}}
            <div class="flex flex-row my-4">



                <div class="basis-1/2 border mx-auto flex flex-col ">
                    <div class=" border m-2">
                        <label> Import file : </label> <br />
                        <input name="importingFile" type="file" class="file:border file:border-solid ..." />
                    </div>
                    <div class="border m-2 flex justify-center">
                        <button type="submit" class="rounded bg-blue-400 p-2"> Import </button>
                    </div>
                </div>

            </div>
        </form>
@endsection
