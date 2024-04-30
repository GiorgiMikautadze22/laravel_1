<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2>{{$job->title}}</h2>
    <p>
        This job pays {{$job->salary}} per year.
    </p>

    <div class="mt-6">
        <x-button href="{{$job->id}}/edit">Edit</x-button>
    </div>

</x-layout>
