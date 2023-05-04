<?php
require "./header.php"
?>
<script>
    $(document).ready(
        () => {
            $(".home").addClass("active");
        }
    )
</script>
<section class="carousel px-1">
    <div id="carouselExampleInterval" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-inner ">
            <div class="carousel-item active page1 ">

            </div>
            <div class="carousel-item page2 ">
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
</section>

<!-- **
TESTIMONIALS
**-->

<section id="testimonial" class="overflow-hidden">
    <div class="row  justify-content-between align-items-center">
        <div class="col-lg-12 col-md-12">
            <h2 class="text-dark text-center mt-3">Testimonies</h2>
        </div>
        <div class="col-lg-12 col-md-12 px-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item pt-3 active">
                        <p class=""><i class="fa-sharp fa-solid fa-quote-left fa-2x px-2"></i> We were provided adequateopportunities to improvepersonality development skills, Oratory and Public speaking Sports and
                            Physical exercises taught us the importance of Discipline, Time Management,Punctuality and Team Work <i class="fa-sharp fa-solid fa-quote-right fa-2x px-2"></i>
                        </p>
                        <div class="row pb-3 justify-content-between align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <img src="./images/courses-3.jpg" class="image2 img-fluid" alt="">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <h5>Mr. Jayakumar Ramdass</h5>
                                <span>Managing Director, Mahendra Submersible Pumps</span>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3 carousel-item">
                        <p class=""><i class="fa-sharp fa-solid fa-quote-left fa-2x px-2"></i> If the PSG Institute enjoys pride of place now, the credit for envisioning and planing for it years ago should go to
                            Mr.G.R.Damodaran. <i class="fa-sharp fa-solid fa-quote-right fa-2x px-2"></i>
                        </p>
                        <div class="row pb-3 justify-content-between align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <img src="./images/courses-2.jpg" class="image2 img-fluid" alt="">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <h5>Rajesh B Lund</h5>
                                <span>Director, Srivari Property Developers</span>
                            </div>
                        </div>
                    </div>
                    <div class="pt-3 carousel-item">
                        <p class=""><i class="fa-sharp fa-solid fa-quote-left fa-2x px-2"></i> At PSGIM the wide exposure we got from the guest lectures on a routine basis,and the numerous presentations we did
                            helped improve our communication skills and gain self confidence. <i class="fa-sharp fa-solid fa-quote-right fa-2x px-2"></i>
                        </p>
                        <div class="row pb-3  justify-content-between align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <img src="./images/courses-1.jpg" class="image2" alt="">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <h5>Mr. Ashwin Pandiyan</h5>
                                <span>Executive Director, Aachi Masala</span>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" style="color: transparent;" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" style="color: transparent;" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>

<?php
require "./footer.php"
?>