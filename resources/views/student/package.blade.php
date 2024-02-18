@include('../default')
<div>
    @if ($packages->isEmpty())
        <p>No packages definition available.</p>
    @else
        @foreach ($packages as $package)
            <div>
                <p>Id: {{ $package->id }}</p>
                <p>Start Date: {{ $package->start_date ?? 'NULL' }}</p>
                <p>End Date: {{ $package->end_date ?? 'NULL'}}</p>
                <p>Remaining amount: {{ $package->remaining_amount ?? 'NULL'}}</p>
                <p>Active: {{ $package->active }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</div>
