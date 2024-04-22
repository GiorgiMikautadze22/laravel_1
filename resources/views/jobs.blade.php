<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    <div class="space-y-4">
        @foreach($jobs as $job)

            <div class="border border-gray-300 rounded-lg py-6 px-4">
                <a href="/jobs/{{$job['id']}}" >
                    <div class="text-blue-400 hover:underline">{{$job->employer->name}}</div>
                    <div>
                        <strong>{{$job['title']}}</strong>: Pays {{$job['salary']}}
                    </div>
                </a>
            </div>

        @endforeach
    </div>

</x-layout>
