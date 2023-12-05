<div class="container-fluid bg-white mt-5 border-top border-2 border-secondary">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="judul fw-bold fs-3 mb-2">BAD Hotel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae beatae <br> corporis 
                voluptas nam odit quidem <br> commodi ullam mollitia impedit
            </p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
            <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
            <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
            <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow Us</h5>
            <a href="<?php echo $contact_r['ig'] ?>" class="d-inline-block text-dark text-decoration-none mb-3">
                <i class="bi bi-instagram"></i> Instargram
            </a>
            <br>
            <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-3">
                <i class="bi bi-facebook"></i> Facebook
            </a>
            <br>
            <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block text-dark text-decoration-none mb-3">
                <i class="bi bi-twitter"></i> Twitter
            </a>
        </div>
    </div>
</div>

<h6 class="text-center bg-dark text-white p-3 m-0">Designed and Developed by BAD Hotel</h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

    function alert(type,msg,position='body'){
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = `
            <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
                <strong class="me-3">${msg}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;

        if(position=='body'){
            document.body.append(element);
            element.classList.add('custom-alert')
        } else {
            document.getElementById(position).appendChild(element);
        }

        setTimeout(remAlert, 3000);
    }

    function remAlert(){
        document.getElementsByClassName('alert')[0].remove();
    };

    function setActive(){
        let navbar = document.getElementById('nav-bar');
        let a_tags = navbar.getElementsByTagName('a');

        for(i=0; i<a_tags.length; i++){
            let file = a_tags[i].href.split('/').pop();
            let file_name = file.split('.')[0];
            if(document.location.href.indexOf(file_name) >= 0){
                a_tags[i].classList.add('active')
            }
        }
    }

    let register_form = document.getElementById('register-form');

    register_form.addEventListener('submit',function(e){
        e.preventDefault();

        let data = new FormData();

        data.append('name',register_form.elements['name'].value);
        data.append('email',register_form.elements['email'].value);
        data.append('phonenum',register_form.elements['phonenum'].value);
        data.append('address',register_form.elements['address'].value);
        data.append('pass',register_form.elements['pass'].value);
        data.append('cpass',register_form.elements['cpass'].value);
        data.append('register','');

        var myModal = document.getElementById('registModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/login_register.php",true);
        xhr.onload = function(){
            if(this.responseText == 'pass_mismatch'){
                alert('error',"Password not match with confirm password!")
            }
            else if(this.responseText == 'email_already'){
                alert('error',"Email already registered!")
            }
            else if(this.responseText == 'phone_already'){
                alert('error',"Phone number already registered!")
            }
            else if(this.responseText == 'ins_failed'){
                alert('error',"Failed registration!")
            }
            else {
                alert('success',"Registration successful")
                register_form.reset();
            }
        }
        xhr.send(data);
    })

    setActive()
</script>