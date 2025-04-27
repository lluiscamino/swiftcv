@php use App\ResumeTemplates\TemplateType; @endphp
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<link rel="stylesheet" href="/css/resumes-carousel.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach(TemplateType::cases() as $templateType)
            <div class="swiper-slide"><img src="{{$templateType->getExampleImageLink()}}"
                                           alt="{{$templateType->getUserFriendlyName()}}"></div>
        @endforeach
    </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 'auto',
        spaceBetween: 30,
    });
</script>