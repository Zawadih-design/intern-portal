@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white shadow rounded-xl p-8">

        <h1 class="text-2xl font-bold mb-6">
            Assign New Task
        </h1>


        @if($errors->any())

            <div class="bg-red-100 text-red-700 p-4 rounded mb-5">

                <ul>
                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach
                </ul>

            </div>

        @endif



        <form method="POST" action="{{ route('tasks.store') }}">

            @csrf


            <!-- Intern -->

            <div class="mb-5">

                <label class="block font-medium mb-2">
                    Assign To Intern
                </label>


                <select 
                    name="intern_id"
                    class="w-full border rounded-lg p-3">

                    <option value="">
                        Select Intern
                    </option>


                    @foreach($interns as $intern)

                        <option value="{{ $intern->id }}">

                            {{ $intern->user->name }}

                        </option>

                    @endforeach


                </select>

            </div>




            <!-- Title -->

            <div class="mb-5">

                <label class="block font-medium mb-2">
                    Task Title
                </label>


                <input 
                    type="text"
                    name="title"
                    class="w-full border rounded-lg p-3"
                    placeholder="Example: Configure network devices">

            </div>




            <!-- Description -->

            <div class="mb-5">

                <label class="block font-medium mb-2">
                    Description
                </label>


                <textarea
                    name="description"
                    rows="5"
                    class="w-full border rounded-lg p-3"
                    placeholder="Explain the task requirements">
                </textarea>


            </div>





            <!-- Priority -->

            <div class="mb-5">

                <label class="block font-medium mb-2">
                    Priority
                </label>


                <select
                    name="priority"
                    class="w-full border rounded-lg p-3">


                    <option value="Low">
                        Low
                    </option>


                    <option value="Medium">
                        Medium
                    </option>


                    <option value="High">
                        High
                    </option>


                </select>


            </div>






            <!-- Deadline -->

            <div class="mb-5">

                <label class="block font-medium mb-2">
                    Deadline
                </label>


                <input
                    type="date"
                    name="deadline"
                    class="w-full border rounded-lg p-3">


            </div>




            <button
                type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">

                Assign Task

            </button>


        </form>


    </div>

</div>


@endsection