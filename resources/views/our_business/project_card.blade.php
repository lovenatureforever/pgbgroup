<div class="col-md-4">
    <div class="portfolio-item ct-{{ $project->category }} project-hover-card" style="position:relative;">
        <div class="portfolio-item-wrap">
            <div class="portfolio-slider project-slider-hover" style="position:relative;">
                <div class="carousel" data-arrows="false" data-dots="false" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="1500">
                    @foreach ($project->images as $image)
                    <a href="/our-businesses-detail/{{ $project->id }}"><img class="carousel-img" src="{{ $image->url }}" alt=""></a>
                    @endforeach
                </div>
                <div class="project-desc-overlay">
                    <a href="/our-businesses-detail/{{ $project->id }}"><span>{{ $project->office }}</span></a>
                </div>
            </div>
            <span class="status-tag {{$project->status}}">{{ ucfirst($project->status) }}</span>
        </div>
        <div class="project-desc-overlay">
            <span>{{ $project->office }}</span>
        </div>
        <a href="/our-businesses-detail/{{ $project->id }}">
            <h4 class="portfolio-title">{{ $project->title }}</h4>
        </a>
    </div>
    <style>
    .project-hover-card {
        position: relative;
    }
    .project-hover-card .portfolio-slider img {
        transition: filter 0.3s;
    }
    .project-hover-card .portfolio-slider:hover img {
        filter: brightness(0.9);
    }
    .project-slider-hover {
        position: relative;
    }
    .project-slider-hover img {
        border-radius: 1rem;
    }
    .project-desc-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.05);
        opacity: 0;
        transition: opacity 0.3s;
        z-index: 30;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
        border-radius: 1rem;
    }
    .project-slider-hover img {
        border-radius: 1rem;
    }
    .project-slider-hover:hover .project-desc-overlay {
        opacity: 1;
        pointer-events: auto;
    }
    .project-desc-overlay span {
        color: #fff;
        font-size: 1.1rem;
        text-align: center;
        padding: 20px;
        z-index: 31;
        display: block;
        width: 100%;
        word-break: break-word;
        text-shadow: 0 2px 8px rgba(0,0,0,0.5);
        justify-content: center;
        align-items: center;
    }
    </style>
</div>
