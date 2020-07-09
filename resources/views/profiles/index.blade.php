<x-app>
    @forelse ($profiles as $profile)
        <form 
            action="{{ route('profile_show', [
                    'profile'=>$profile->username
                ]) 
            }}" 
            method="GET" 
            class=""
        >
            @csrf 
            <input
                type="submit" 
                value=" {{ $profile->username }}"
            />
        </form>
    @empty 
        No Users Yet
    @endforelse

</x-app>