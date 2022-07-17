<nav class="hidden md:flex item-center justify-between text-gray-400 text-xs">
    <ul class="flex uppercase font-semibold border-gray-300 border-b-4 pb-3 rounded">
        <li>
            <a wire:click.prevent="setStatus('All')" class="border-b-4 pb-3 hover:border-blue border-gray-300 @if($status === 'All') border-blue text-gray-900 @endif" href="#">
                All ideas ({{$statusCount['all_statuses']}})
            </a>
            <a wire:click.prevent="setStatus('Considering')" class="ml-5 hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in duration-150 @if($status === 'Considering') border-blue text-gray-900 @endif"
                href="#">
                Considering ({{$statusCount['considering']}})
            </a>
            <a wire:click.prevent="setStatus('In progress')" class="ml-5 hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in duration-150 @if($status === 'In progress') border-blue text-gray-900 @endif"
                href="#">
                In progress ({{$statusCount['in_progress']}})
            </a>
        </li>
    </ul>

    <ul class="flex uppercase font-semibold border-gray-300 border-b-4 pb-3 rounded">
        <li>
            <a wire:click.prevent="setStatus('Implemented')" class="hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in duration-150 @if($status === 'Implemented') border-blue text-gray-900 @endif"
                href="#">
                Implemented ({{$statusCount['implemented']}})
            </a>
            <a wire:click.prevent="setStatus('Closed')" class="ml-5 hover:border-blue border-gray-300 border-b-4 pb-3 transition ease-in duration-150 @if($status === 'Closed') border-blue text-gray-900 @endif"
                href="#">
                Closed ({{$statusCount['closed']}})
            </a>
        </li>
    </ul>
</nav>