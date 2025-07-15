

    <div class="container py-5">
    <div class="mb-4">
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">Danh mục: {{ $post->category->name ?? 'Chưa phân loại' }}</p>
        <p class="text-muted">Tác giả: {{ $post->user->name ?? 'Ẩn danh' }} | 
            Ngày đăng: {{ $post->created_at->format('d/m/Y') }}</p>
    </div>

    @if ($post->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->title }}">
        </div>
    @endif

    <div class="mb-4">
        <h4>Giới thiệu</h4>
        <p>{{ $post->slug }}</p>
    </div>

    <div>
        <h4>Nội dung</h4>
        <div>{!! nl2br(e($post->content)) !!}</div>
    </div>
</div>




