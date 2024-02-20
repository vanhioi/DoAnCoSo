

<section class="contanier">
    <div class="slider-wrapper">
        <div class="slider">
            <img class="slider-img" id="slider-1" src="../IMAGES/hinhnen.png" alt="">
            <img class="slider-img" id="slider-2" src="../IMAGES/hinhnen2.png" alt="">
            <img class="slider-img" id="slider-3" src="../IMAGES/hinhnen3.png" alt="">
        </div>
        <div class="slider-nav">
            <a class="slider-nav-item" href="#" onclick="currentSlide(1)"></a>
            <a class="slider-nav-item" href="#" onclick="currentSlide(2)"></a>
            <a class="slider-nav-item" href="#" onclick="currentSlide(3)"></a>
        </div>
    </div>
</section>

<div class="all_product">
    <a href="index.php">ALL PRODUCTS</a>
</div>

<style>
    .all_product {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 5vh;
        background-color: black;
        border-radius: 5px;
        margin: 45px;
        width: 15%;
        margin-left: auto;
        margin-right: auto;
        
    }
    .all_product a {
        text-decoration: none;
        color: #fff;
        font-size: 22px;
    }
    /* Code của trang chủ*/
    .slider-wrapper {
        position: relative;
        max-width: 40rem;
        margin: 0 auto;
    }
    .slider {
        display: flex;
        aspect-ratio: 16 / 9;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;   
        box-shadow: 0 1.5rem 3rem -0.75rem hsla(0, 0%, 0%, 0.25);
        border-radius: 0.5rem;
    }
    .slider img {
        flex: 1 0 100%;    
        scroll-snap-align: start;       
        object-fit: cover;           
    }
    .slider-nav {
        display: flex;
        column-gap: 1rem;
        position: absolute;
        bottom: 1.25rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;
    }                
    .slider-nav a {
        width: 0.5rem;
        height: 0.5rem;
        border-radius: 50%;
        background-color: #fff;
        opacity: 0.75;
        transition: opacity ease 250ms;
    }
    .slider-nav a:hover {
        opacity: 1;
    }

    
</style>
<!-- ... (HTML code) ... -->

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("slider-img");
        let dots = document.getElementsByClassName("slider-nav-item");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }

    function autoSlide() {
        plusSlides(1);
    }

    // Thêm hàm setInterval để gọi autoSlide mỗi 5000 miliseconds (5 giây)
    setInterval(autoSlide, 5000);
</script>

<!-- ... (End of HTML code) ... -->