<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bar overzicht
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl">Te maken bestellingen</h2>

                    @foreach($orders as $order)
                    <div class="order-card mb-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tafel {{ $order->seat->number }}</h5>
                        </a>
                        <p class="text-gray-500">
                            Tijd van bestelling: {{ Date('H:i', strtotime($order->created_at) ) }}
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">

                            <ul>
                                @foreach($order->consumables->groupBy('name') as $key => $value)
                                    @if($value[0]->category->name == 'drank')
                                        <li> {{ $key }} x {{ count($value) }} </li>
                                    @endif
                                @endforeach
                            </ul>

                        </p>

                        <form method="post" action="{{route('order.update', $order)}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="type" value="drinks">
                            <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Afronden
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </form>

                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
