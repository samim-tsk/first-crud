@forelse ($brands as $brand)
    <tr>
        <td>{{ __($loop->iteration) }}</td>
        <td>{{ __($brand->title) }}</td>
        <td>{{ __(\Str::limit($brand->description, 20)) }}</td>
        <td>{{ __($brand->category->title) }}</td>
        <td>
            <img width="60" height="60" src="{{ $brand->getImage() }}" alt="">
        </td>
        <td>
            <button class="btn edit-btn" data-brand='@json($brand)'><i class="mdi mdi-pencil"></i></button>

            <button class="btn delete-btn" data-id={{ $brand->id }}>
                <i class="mdi mdi-delete"></i>
            </button>
        </td>
    </tr>
@empty
@endforelse
