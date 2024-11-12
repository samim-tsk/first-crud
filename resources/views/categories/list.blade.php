@forelse ($categories as $category)
    <tr>
        <td>{{ __($loop->iteration) }} </td>
        <td>{{ __($category->title) }}</td>
        <td>{{ __(\Str::limit($category->description, 20)) }}</td>
        <td>
            <button class="btn edit-btn" data-category='@json($category)'>
                <i class="mdi mdi-pencil"></i>
            </button>

            <button class="btn delete-btn" data-id={{ $category->id }}>
                <i class="mdi mdi-delete"></i>
            </button>
        </td>
    </tr>
@empty
@endforelse
