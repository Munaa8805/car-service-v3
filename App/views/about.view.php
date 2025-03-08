<!-- Page Header Start -->
<?php loadPartial("head"); ?>
<?php loadPartial('topbar'); ?>

<?php loadPartial('navbar'); ?>
<div class="container-fluid page-header mb-5 p-0"
    style="background-image: url(<?php echo URLROOT; ?>/img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->










<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Our Technicians //</h6>
            <h1 class="mb-5">Our Expert Technicians</h1>
        </div>
        <div class="row g-4" id="team">

        </div>
    </div>
</div>
<!-- Team End -->


<script>
let teamId = document.getElementById('team');
let content = '';
let tm = 0.1;
let dummyImage = 'https://res.cloudinary.com/djws6cbsg/image/upload/v1737660973/IMG_3701_ymvnk6.jpg';
let nameLastName = 'Jon';
let nameFirstName = 'Doe';
let nameCompany = 'Carpenter';

function getTeam() {

    fetch('https://dummyjson.com/users')
        .then(res => res.json())
        .then(res => {
            res.users.forEach(user => {
                console.log(user);
                tm += 0.1;
                content += `
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="${tm}s">
                            <div class="team-item">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid" style='width:100%' src="${user.image ? user.image : dummyImage}" alt="${user.firstName ? user.firstName : nameLastName}">
                                    <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                        <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="bg-light text-center p-4">
                                    <h5 class="fw-bold mb-0">${user.firstName ? user?.firstName : nameFirstName} ${user.lastName ? user?.lastName : nameLastName}</h5>
                                    <small>${user.company ? user.company.title : nameCompany}</small>
                                </div>
                            </div>
                        </div>
                `;
            });
            teamId.innerHTML = content;

        }).catch(err => console.log(err));
}
try {
    getTeam();


} catch (error) {
    console.log(error);

}
</script>

<?php loadPartial('footer'); ?>