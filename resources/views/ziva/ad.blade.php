<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js" defer></script>

<div id="ad-slider" class="splide">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach(\App\Models\Ad::where('is_active', true)->latest()->get() as $ad)
                <li class="splide__slide">
                    @if($ad->media_type === 'image')
                        <a href="{{ $ad->link ?? '#' }}">
                            <img src="{{ Storage::url($ad->media_path) }}" alt="{{ $ad->title }}">
                        </a>
                    @elseif($ad->media_type === 'video')
                        <video controls style="width: 100%">
                            <source src="{{ Storage::url($ad->media_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                    @if($ad->title || $ad->caption)
                        <div class="text-center mt-2">
                            <strong>{{ $ad->title }}</strong><br>
                            <span>{{ $ad->caption }}</span>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        new Splide('#ad-slider', {
            type   : 'loop',
            autoplay: true,
            interval: 5000,
            pauseOnHover: true,
        }).mount();
    });
</script>
