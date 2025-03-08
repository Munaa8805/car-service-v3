<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="text-primary text-uppercase">// Testimonial //</h6>
            <h1 class="mb-5">Our Clients Say!</h1>
        </div>
        <div class="test-app" id="haha">


        </div>
    </div>
</div>

<script>
const parentContainer = document.getElementById('haha');
let content = '';
let tm = 0.1;
fetch('https://dummyjson.com/comments?limit=4')
    .then(res => res.json())
    .then(res => {

        res.comments.forEach((user) => {
            let Rnumber = Math.floor(Math.random() * 4) + 1;
            tm += 0.1;
            content += `
                      <div data-wow-delay="0.2s" class="testimonial-item text-center" style="width: 300px;" >
                        <img class="bg-light rounded-circle p-2 mx-auto mb-3"
                            src="<?php echo URLROOT; ?>/img/testimonial-${Rnumber}.jpg"
                            style="width: 80px; height: 80px;">
                        <h5 class="mb-0">${user.user.username}</h5>
                        <p>${user.user.fullName}</p>
                        <div class="t-body" >
                            <p class="mb-0">${user.body}</p>
                        </div>
                    </div>
                `;
        })
    }).then(() => {
        parentContainer.insertAdjacentHTML('beforeend', content);
    }).catch(err => console.log(err));
</script>
<!--    Testimonial End -->