<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinshuk-Portfolio</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/10856/10856864.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@200&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
    <script rel src="{{ asset('js/home/home.js') }}"></script>
</head>
<body>
    <div class="main-body">

        <div class="profile-image">
            <img src="{{ asset('storage/uploads/' . $return_data['basic_info']['image_path']) }}" id="ProfileImage-img">
        </div>

        <div class="content-body">

            <!-- Header Section Start  -->
            <div class="Header animation">
                
                <!-- User-Name Section Start -->
                <h1 id="user-name">
                    {{ $return_data['basic_info']['name'] }}
                </h1>
                <h1 id="user-role">{{ $return_data['basic_info']['role'] }}</h1>
                <div class="second-image-section">
                    <img src="{{ asset('storage/uploads/' . $return_data['basic_info']['image_path']) }}" id="media-query-image">
                </div>
                <!-- User-Name Section END -->

                <!-- Download Resume Section Start -->
                <div class="download-resume-section">
                    <div class="download-button">
                        <img src="{{ asset('storage/images/assets/icons/download.png') }}" id="DownloadImage-img">
                    </div>
                    
                    <button id="download-button" ><h1>Download Resume</h1></button>
                </div>
                <!-- Download Resume Section END -->

            </div>
            <!-- Header Section End  -->

            <!-- About Section Start -->
            <div class="about-section animation">
                <div class="head-Title">
                    <h1>About</h1>
                    <hr>
                </div>
                <div class="about-body">
                    <p>{{ $return_data['basic_info']['about'] }}</p>
                </div>
            </div>
            <!-- About Section End -->

            <!-- Portfolio-Section Start -->
            <div class="my-portfolio-section animation">
                <div class="head-Title">
                    <h1>My Portfolio</h1>
                    <hr>
                </div>
                <div class="portfolio-pictures">
                    @foreach($return_data['attachment_info'] as $info)
                        @if($info["type"] == "attachments")
                            <img src="{{ asset('storage/uploads/attachments/' . $info['attachment_path']) }}" style="cursor:pointer;" alt="">
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- Portfolio-Section End -->

            <!-- Custom Modal To Show Clicked Images -->
            <div id="imageModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <img id="modalImage" alt="Selected Image">
                </div>
            </div>
            <!-- Portfolio-Section End -->

            <!-- My Skills-Section Start -->
            <div class="skills-section animation">
                <div class="head-Title">
                    <h1>My Skills</h1>
                    <hr>
                </div>
                <div class="skill-body">
                    @foreach($return_data['skill_informattion'] as $info)
                        <div class="skill-name">
                            <p >{{ $info["skill_name"] }}</p>
                        </div>
                        <div class="outer-bar">
                            <div class="percentage-bar" style="width: {{ $info['skill_percent'] }}%;">
                                <p>{{ $info["skill_percent"] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- My Skills-Section End -->


            <!-- Projects Worked Section Start -->
            <div class="projects-worked-section animation">
                <div class="head-Title">
                    <h1>My Worked Domains</h1>
                    <hr>
                </div>


                <ul class="projects-worked-body">
                    <li class="project-item">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <p>E-Commerce</p>
                            <i class="fa-solid fa-arrow-down"></i>
                        </div>
                        <div class="project-details">
                            <p>Item 1: Description or details about E-Commerce project.</p>
                            <p>Item 2: Another detail related to the E-Commerce project.</p>
                        </div>
                    </li>
                    <li class="project-item">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <p>Customer Relationship Management</p>
                            <i class="fa-solid fa-arrow-down"></i>
                        </div>
                        <div class="project-details">
                            <p>Item 1: Description or details about CRM project.</p>
                            <p>Item 2: Another detail related to the CRM project.</p>
                        </div>
                    </li>
                    <li class="project-item">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <p>Chat Application</p>
                            <i class="fa-solid fa-arrow-down"></i>
                        </div>
                        <div class="project-details">
                            <p>Item 1: Description or details about Chat Application project.</p>
                            <p>Item 2: Another detail related to the Chat Application project.</p>
                        </div>
                    </li>
                    <li class="project-item">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <p>Smart Gatekeeper</p>
                            <i class="fa-solid fa-arrow-down"></i>
                        </div>
                        <div class="project-details">
                            <p>Item 1: Description or details about Smart Gatekeeper project.</p>
                            <p>Item 2: Another detail related to the Smart Gatekeeper project.</p>
                        </div>
                    </li>
                </ul>
  

            </div>  

            <!-- Projects Worked Section End -->


            <!-- My Price-Section Start  -->
            <!-- <div class="my-price-section animation">
                <div class="head-Title">
                    <h1>My Price</h1>
                    <hr>
                </div>
                <div class="plans">
                    <div class="basic-price-section">
                        <div class="price-category-name-basic">
                            <p>Basic</p>
                        </div>
                        <div class="features-section">
                            <div class="feature-name">
                                <p>Maintenance & Support</p>
                            </div>
    
                            <div class="feature-name">
                                <p>Backend & Frontend Development</p>
                            </div>
    
                            <div class="feature-name">
                                <p>Performance Optimization</p>
                            </div>
    
                            <div class="feature-name">
                                <p>Security Features</p>
                            </div>
                        </div>
                        <div class="pricing-section">
                            <div class="price">
                                <h1>$ 5 / ₹ 420</h1>
                                
                            </div>
                            <div style="display:flex; align-items:center; justify-content:center;">
                                <h4>Per Hour</h4>
                            </div>
                        </div>
    
                        <div class="signup-section">
                            <div class="signup-button-section">
                                <div class="signup-button">
                                    <a href="">Sign Up</a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="ultimate-price-section">
                        <div class="price-category-name-ultimate">
                            <p>Ultimate</p>
                        </div>
                        <div class="coming-soon">
                            <p>Coming Soon</p>
                        </div>
                        
                        <div style="display:none;" class="features-section">
                            <div class="feature-name">
                                <p>Maintenance & Support</p>
                            </div>
    
                            <div class="feature-name">
                                <p>Backend & Frontend Development</p>
                            </div>
    
                            <div class="feature-name">
                                <p>Performance Optimization</p>
                            </div>
    
                            <div class="feature-name">
                                <p>Security Features</p>
                            </div>
                        </div>
                        <div style="display:none;" class="pricing-section">
                            <div class="price">
                                <h1>$ 5 / ₹ 420</h1>
                                
                            </div>
                            <div style="display:flex; align-items:center; justify-content:center;">
                                <h4>Per Hour</h4>
                            </div>
                        </div>
    
                        <div style="display:none;" class="signup-section">
                            <div class="signup-button-section">
                                <div class="signup-button">
                                    <a href="">Sign Up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- My Price-Section End  -->

            <!-- Contact-Me Section Start  -->
            <div class="contact-me-section animation">
                <div class="head-Title">
                    <h1>Contact Me</h1>
                    <hr>
                </div>

                <div class="contact-me-body">
                    <div class="location-section">
                        <img src="{{ asset('storage/images/assets/icons/placeholder.png') }}" style="height:30px;width:30px;margin-right:5px;">
                        <p>{{ $return_data['basic_info']['city'] }}, {{ $return_data['basic_info']['state'] }}, {{ $return_data['basic_info']['country'] }}</p>
                    </div>

                    <div class="mobile-section">
                        <img src="{{ asset('storage/images/assets/icons/old-typical-phone.png') }}" style="height:30px;width:30px;margin:0px 10px 0px 5px;">
                        <p>Phone : +91 {{ $return_data['basic_info']['mobile'] }}</p>
                    </div>

                    <div class="mail-section">
                        <img src="{{ asset('storage/images/assets/icons/gmail.png') }}" style="height:30px;width:30px;margin:0px 10px 0px 5px;">
                        <p>Email : {{ $return_data['basic_info']['email'] }}</p>
                    </div>

                    <div class="image-section-contact-me">
                        <img src="{{ asset('storage/images/assets/coding.jpg') }}" style="width:100%;height:100%;overflow:hidden;">
                    </div>

                    <div class="contact-me-form-section">
                        <h3>Lets get in touch. Send me a message:</h3>
                        <div class="form-section">
                            <form class="contact-me-form" action="">
                                <input type="text" placeholder="Name">
                                <input type="text" placeholder="Email">
                                <input type="text" placeholder="Subject">
                                <textarea name="" id="" style="height: 80px;min-width:90%;max-width:100%;" placeholder="Message"></textarea>
                                <button id="send-message-button"><img src="{{ asset('storage/images/assets/icons/send.png') }}" style="width:30px;height:30px;margin-right:10px;">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Contact-Me Section End  -->


            <!-- Footer Section Start -->
            <div class="footer-section animation">
                <div class="footer">
                    <div class="socialimages">
                        @if($return_data['basic_info']['facebook_id'] != null)
                            <a href="{{ $return_data['basic_info']['facebook_id'] }}"><img src="{{ asset('storage/images/assets/icons/facebook.png') }}" style="width:25px;height:25px;margin:5px;"></a>
                        @endif

                        @if($return_data['basic_info']['github_id'] != null)
                            <a href="{{ $return_data['basic_info']['github_id'] }}"><img src="{{ asset('storage/images/assets/icons/github-sign.png') }}" style="width:25px;height:25px;margin:5px;"></a>
                        @endif

                        @if($return_data['basic_info']['linked_in_id'] != null)
                            <a href="{{ $return_data['basic_info']['linked_in_id'] }}"><img src="{{ asset('storage/images/assets/icons/linkedin.png') }}" style="width:25px;height:25px;margin:5px;"></a>
                        @endif
                    
                        </div>
                    <h3>Developed By : <a href="">Kinshuk Guha</a></h3>
                </div>
            </div>
            <!-- Footer Section End -->

        </div>
    </div>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.projects-worked-body li.project-item').forEach(item => {
            item.addEventListener('click', () => {
                const details = item.querySelector('.project-details');

                // Check if details are currently visible
                if (details.style.display === 'block') {
                    details.style.display = 'none'; // Hide details if they are already visible
                    item.classList.remove('expanded'); // Remove expanded class
                } else {
                    details.style.display = 'block'; // Show details
                    item.classList.add('expanded'); // Add expanded class
                }
            });
        });
    });
</script>