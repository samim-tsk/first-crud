<x-layouts.admin>
    <x-page-header title="Dashboard"/>
            <div class="container-fluid">
                <div class="card-group">
                    <x-card title="Categories" count="{{ __($categories) }}"/>
                    <x-card title="Brands" count="{{ __($brands) }}"/>
                    {{-- <x-card title="Brands" count="12"/>
                    <x-card title="Categories" count="06"/> --}}
                </div>
                <div class="row">
                
                </div>
            </div>
</x-layouts.admin>