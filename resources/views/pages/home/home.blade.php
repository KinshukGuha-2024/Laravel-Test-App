<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/10856/10856864.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@200&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
    <script rel src="{{ asset('js/home/home.js') }}"></script>
</head>
<body>
    <div class="main-body">
        @if($basic_info) 
            <div class="profile-image">
                <img src="{{ asset('storage/uploads/' . $basic_info['image_path']) }}" id="ProfileImage-img">
            </div>

            <div class="content-body">

                <!-- Header Section Start  -->
                <div class="Header animation">
                    
                    <!-- User-Name Section Start -->
                    <h1 id="user-name">
                        {{ $basic_info['name'] }}
                    </h1>
                    <h1 id="user-role">{{ $basic_info['role'] }}</h1>
                    <div class="second-image-section">
                        <img src="{{ asset('storage/uploads/' . $basic_info['image_path']) }}" id="media-query-image">
                    </div>
                    <!-- User-Name Section END -->

                    <!-- Download Resume Section Start -->
                    <div class="download-resume-section" onclick = "download_resume();">
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
                        <p>{{ $basic_info['about'] }}</p>
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
                        @foreach($attachment_info as $attachment)
                            @if($attachment['type'] == 'attachments')
                            <img src="{{ asset('storage/uploads/attachments/' .$attachment['attachment_path']) }}" 
                                loading="lazy" 
                                style="cursor:pointer; width: 300px; height: auto;aspect-ratio: 16/9;" 
                                alt="">

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
                        <!-- Dynamic Data will come here from js -->
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

                <!-- Contact-Me Section Start  -->
                <div class="contact-me-section animation">
                    <div class="head-Title">
                        <h1>Contact Me</h1>
                        <hr>
                    </div>

                    <div class="contact-me-body">
                        <div class="location-section">
                            <img src="{{ asset('storage/images/assets/icons/placeholder.png') }}" style="height:30px;width:30px;margin-right:5px;">
                            <p>{{ $basic_info['city'] }}, {{ $basic_info['state'] }}, {{ $basic_info['country'] }}</p>
                        </div>

                        <div class="mobile-section">
                            <img src="{{ asset('storage/images/assets/icons/old-typical-phone.png') }}" style="height:30px;width:30px;margin:0px 10px 0px 5px;">
                            <p>Phone : +91 {{ $basic_info['mobile'] }}</p>
                        </div>

                        <div class="mail-section">
                            <img src="{{ asset('storage/images/assets/icons/gmail.png') }}" style="height:30px;width:30px;margin:0px 10px 0px 5px;">
                            <p>Email : {{ $basic_info['email'] }}</p>
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
                            @if($basic_info['facebook_id'] != null)
                                <a href="{{ $basic_info['facebook_id'] }}"><img src="{{ asset('storage/images/assets/icons/facebook.png') }}" style="width:25px;height:25px;margin:5px;"></a>
                            @endif

                            @if($basic_info['github_id'] != null)
                                <a href="{{ $basic_info['github_id'] }}"><img src="{{ asset('storage/images/assets/icons/github-sign.png') }}" style="width:25px;height:25px;margin:5px;"></a>
                            @endif

                            @if($basic_info['linked_in_id'] != null)
                                <a href="{{ $basic_info['linked_in_id'] }}"><img src="{{ asset('storage/images/assets/icons/linkedin.png') }}" style="width:25px;height:25px;margin:5px;"></a>
                            @endif
                        
                            </div>
                        <h3>Developed By : <a href="">Kinshuk Guha</a></h3>
                    </div>
                </div>
                <!-- Footer Section End -->

            </div>
        @else
            <div style="display: flex; justify-content: center; align-items: center; height: 500px; background-color: #f8f9fa; text-align: center; padding: 20px; width:100%;height:100vh; ">
                <div>
                    <img src="https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExa2xlcWZ5cm9lazZqYTczYXl0NWFyYXF2bnI5cTZmNzZhdTc2dnM0eSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/RM0FFEcOLBzEjtrbCK/giphy.gif" alt="">
                    <h1 style="color: #dc3545; font-family: 'Prompt', sans-serif; font-weight: bold;">
                        No Data Available
                    </h1>
                </div>
            </div>
        
        @endif
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



        const skillInformation = <?php echo json_encode($skill_information); ?>;
        const skillContainer = document.querySelector(".skill-body"); // Select the parent container

        skillContainer.innerHTML = ""; // Clear existing content

        skillInformation.forEach(skill => {
            const skillDiv = document.createElement("div");
            skillDiv.classList.add("skill-item");

            skillDiv.innerHTML = `
                <div class="skill-name">
                    <p>${skill.skill_name}</p>
                </div>
                <div class="outer-bar">
                    <div class="percentage-bar" style="width:${skill.skill_percent}%">
                        <p>${skill.skill_percent}%</p>
                    </div>
                </div>
            `;

            skillContainer.appendChild(skillDiv);
        });

        document.querySelectorAll(".portfolio-pictures img").forEach(img => {
            img.onload = () => img.classList.add("loaded");
        });
    });

    function download_resume() {
        const all_attachments = <?php echo json_encode($attachment_info); ?>;
        var path = null;
        all_attachments.forEach(data => {
            if(data.type == 'resume') {
                path = data.attachment_path;
            }
        });
        if(path) {
            const baseUrl = "<?php echo env('APP_URL'); ?>";
            const fileUrl = baseUrl + '/storage/uploads/attachments/' + path;

            // Create a hidden link and trigger download
            const a = document.createElement('a');
            a.href = fileUrl;
            a.download = path.split('/').pop(); // Extracts the file name from the path
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }
    }

</script>