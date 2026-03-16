<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Usaha Jaya Prima Karya</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- buat icon dari awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

@include('template.frontend.nav')

@yield('content')

@include('template.frontend.footer')

<script>
    feather.replace();

    // Hamburger menu toggle
    const hamburger = document.getElementById('hamburger-menu');
    const navMenu = document.querySelector('.navbar-nav');
    if (hamburger) {
        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });
    }

    // SLIDER

    document.addEventListener("DOMContentLoaded", function(){

    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");

    let index = 0;

    function showSlide(i){

    slides.forEach(slide => slide.classList.remove("active"));
    dots.forEach(dot => dot.classList.remove("active"));

    slides[i].classList.add("active");
    dots[i].classList.add("active");
    index = i;
    }


    // AUTO SLIDE
    setInterval(function(){

    index++;

    if(index >= slides.length){
    index = 0;
    }

    showSlide(index);

    }, 4000);


    // PANAH NEXT
    document.querySelector(".next").addEventListener("click", function(){

    index++;

    if(index >= slides.length){
    index = 0;
    }

    showSlide(index);

    });


    // PANAH PREV
    document.querySelector(".prev").addEventListener("click", function(){

    index--;

    if(index < 0){
    index = slides.length - 1;
    }

    showSlide(index);

    });


    // DOT CLICK
    dots.forEach((dot,i)=>{

    dot.addEventListener("click", function(){

    showSlide(i);

    });

    });

    });

</script>

<script>
const videoIntro = document.getElementById("videoIntro");
const intro = document.getElementById("intro-video");

videoIntro.onended = function(){

    intro.classList.add("fade-out");

    setTimeout(function(){
        intro.style.display = "none";
    },1000);

};
</script>

</body>
</html>