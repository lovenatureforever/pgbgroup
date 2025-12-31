<!-- Inspiro Slider -->
<div id="slider" class="inspiro-slider slider-halfscreen dots-creative" data-arrows="false" data-dots="false">
    @foreach ($slides as $slide)
        <div class="slide background-image {{$slide->effect}}" style="background-image:url('{{ asset($slide->image) }}'); background-position: center;">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    <!-- Captions -->
                    <h2>{{ $slide->title }}</h2>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
    @endforeach
</div>
<!--end: Inspiro Slider -->
