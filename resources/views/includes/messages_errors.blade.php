@if($errors->any())
    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
        <span class="text-xl inline-block mr-5 align-middle">
            <i class="fas fa-bell"></i>
        </span>
        <span class="inline-block align-middle mr-8">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </span>
    </div>
@endif

