@php
    $resumes = [
        'Awesome CV' => 'https://raw.githubusercontent.com/posquit0/Awesome-CV/master/examples/resume-0.png',
        'Jake\'s Resume' => 'https://i.ibb.co/HXRYfgJ/16158.jpg',
        'Rover Resume' => 'https://github.com/subidit/rover-resume/raw/main/img/base-rover.jpg',
        'Awesome CV3' => 'https://raw.githubusercontent.com/posquit0/Awesome-CV/master/examples/resume-0.png',
        'Awesome CV4' => 'https://raw.githubusercontent.com/posquit0/Awesome-CV/master/examples/resume-0.png',
    ]
@endphp
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<link rel="stylesheet" href="/css/resumes-carousel.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach($resumes as $name => $image)
            <div class="swiper-slide"><img src="{{$image}}"
                                           alt="{{$name}}"></div>
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