<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }} | Basic Information</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/10856/10856864.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('component.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Skill</h1>
                    </div>

                    <button class="back-btn" onclick="redirectBack();">
                        <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
                        <span>Back</span>
                    </button>
                    <div class="container-fluid form-contain" style="padding: 20px; height:auto;">  

                        <form id="form" class="form" method="POST" enctype="multipart/form-data" action="{{ route('secured.skill.edit.post') }}">
                            @csrf
                            <p class="title">Add New Skill </p>
                            <label for="state" class="form-label">User</label>
                            <div style="display:flex; justify-content:center; align-items:center;">
                                <input type="text" value="{{ $user_data[0]['name'] }}" name="user_id" class="form-control" id="user_id" disabled>
                            </div>
                            <div class="text-danger user-error" style="display: none;"><strong>User is required.</strong></div>
                            <div id="skills_container">
                                @foreach ($get_skill_data as $index => $skill)
                                <div class="skill_div" style="display: flex; flex: 3; justify-content: space-between; gap: 20px;">
                                    <div style="flex: 4;">
                                        <label for="skill_name_{{ $index }}" class="form-label">Skill Name <strong style="color: red;">*</strong></label>
                                        <input id="skill_name_{{ $index }}" name="skill_name[{{ $index }}]" value="{{ old('skill_name.' . $index, $skill->skill_name) }}" required type="text" class="form-control">
                                        <div class="text-danger skill-error" style="display: none;"><strong>Skill Name is required.</strong></div>
                                    </div>
                                    <input type="hidden" id="skill_data_{{ $index }}" value="{{ json_encode($skill) }}">

                                    <div style="flex: 3;">
                                        <div style="display:flex;justify-content:center;align-items:center;width:100%;height:100%;flex-direction:column;">
                                            <div class="rating">
                                                @foreach (range(5, 1) as $rating)
                                                    <input value="{{ $rating }}" name="rating[{{ $index }}]" id="star{{ $rating }}_{{ $index }}" type="radio" {{ old('rating.' . $index, $skill->skill_percent) == $rating * 20 ? 'checked' : '' }}>
                                                    <label for="star{{ $rating }}_{{ $index }}"></label>
                                                @endforeach
                                            </div>
                                            <div class="text-danger rating-error" style="display: none;"><strong>Rating is required.</strong></div>
                                        </div>
                                    </div>

                                    <div style="flex: 1;">
                                        <div style="display:flex;justify-content:center;align-items:center;width:100%;height:100%;">
                                            <button class="delete_row_btn"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- Add Button -->
                            <div style="display:flex; align-items:center;justify-content:center; width:100%; height:100%;">
                                <button type="button" id="add_skill" style="margin-top: 20px;"><i class="fa-solid fa-circle-plus"></i> Add Skill</button>
                            </div>


                                    
                            


                            <br>
                            <div style="display: flex; justify-content: flex-end; align-items:center;">
                                <button class="submit" id="submit_button" >Submit</button>
                            </div>
                        </form>
                    </div>



                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('component.footer')

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    

</body>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

<script>
     function redirectBack() {
        window.location.href="{{ route('secured.skill.get') }}";
    }

    document.getElementById('form').addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();
    });

    let skillCount = 1; // Counter for unique IDs

    document.getElementById('add_skill').addEventListener('click', function () {
        // Get the skills container
        const skillsContainer = document.getElementById('skills_container');

        // Clone the first skill_div
        const newSkillDiv = document.querySelector('.skill_div').cloneNode(true);

        // Update IDs and names to be unique
        newSkillDiv.querySelectorAll('input').forEach((input) => {
            if (input.type === 'text') {
                input.value = ""; // Clear the value for text input
                input.name = `skill_name[${skillCount}]`; // Update name
            } else if (input.type === 'radio') {
                const idParts = input.id.split('_');
                const newId = idParts[0] + '_' + skillCount;
                input.id = newId; // Update ID
                input.name = `rating[${skillCount}]`; // Update name
                input.checked = false; // Clear radio selection

                // Update corresponding label's 'for' attribute
                const label = newSkillDiv.querySelector(`label[for='${idParts[0]}_${idParts[1]}']`);
                if (label) label.setAttribute('for', newId);
            }
        });

        // Clear error message for the new row
        const ratingError = newSkillDiv.querySelector('.rating-error');
        if (ratingError) {
            ratingError.style.display = 'none';
        }

        const nameError = newSkillDiv.querySelector('.skill-error');
        if (nameError) {
            nameError.style.display = 'none';
        }

        // Add delete button event to the cloned row
        newSkillDiv.querySelector('.delete_row_btn').addEventListener('click', function () {
            handleDelete(this);
        });

        // Append the new skill_div to the container
        skillsContainer.appendChild(newSkillDiv);

        // Check delete button visibility
        updateDeleteButtonVisibility();

        // Increment the counter
        skillCount++;
    });

    document.getElementById('skills_container').addEventListener('click', function(event) {
        if (event.target && event.target.closest('.delete_row_btn')) {
            handleDelete(event.target);
        }
    });

    function handleDelete(button) {
        const skillDiv = button.closest('.skill_div');
        const skillDivs = document.querySelectorAll('.skill_div');

        // Ensure we don't remove the last remaining skill div
        if (skillDivs.length > 1) {
            skillDiv.remove();
            updateDeleteButtonVisibility();
        }
    }

    function updateDeleteButtonVisibility() {
        const skillDivs = document.querySelectorAll('.skill_div');
        const deleteButtons = document.querySelectorAll('.delete_row_btn');
        
        // Hide delete buttons when only one skill div remains
        if (skillDivs.length === 1) {
            deleteButtons.forEach(btn => btn.style.display = 'none');
        } else {
            deleteButtons.forEach(btn => btn.style.display = 'block');
        }
    }

    // Initialize delete button visibility
    updateDeleteButtonVisibility();

    // Add delete functionality to the initial row
    document.getElementById('submit_button').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission

        let isValid = true;
        var incr = 0;

        // Select all skill divs
        const skillDivs = document.querySelectorAll('.skill_div');

        skillDivs.forEach((div, index) => {
            // Adjust the index for each skill div
            const ratingInputs = div.querySelectorAll(`input[name="rating[${index}]"]`);
            const nameInputs = div.querySelectorAll(`input[name="skill_name[${index}]"]`);
            const user = document.getElementById('user_id').value;
            const userError = document.querySelector('.user-error');

            // Validate user input
            if (!user) {
                isValid = false;
                userError.style.display = 'block';
            } else {
                isValid = true;
                userError.style.display = 'none';
            }

            const skillName = nameInputs.length > 0 ? nameInputs[0].value.trim() : ''; // Get the skill name value
            const isRatingSelected = Array.from(ratingInputs).some(input => input.checked);

            // Get the error elements
            const ratingError = div.querySelector('.rating-error');
            const skillError = div.querySelector('.skill-error');

            // Reset errors before validation
            if (ratingError) ratingError.style.display = 'none';
            if (skillError) skillError.style.display = 'none';

            // Validate the rating input
            if (!isRatingSelected) {
                isValid = false;
                if (ratingError) ratingError.style.display = 'block'; // Show rating error if not selected
            }

            // Validate the skill name input
            if (!skillName) {
                isValid = false;
                if (skillError) skillError.style.display = 'block'; // Show skill name error if empty
            }
        });

        if (isValid) {
            // If valid, submit the form
            document.getElementById('form').submit();
        }
    });

    // Handle the deletion of rows dynamically
    document.querySelectorAll('.delete_row_btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            
            // Find the parent skill div
            const skillDiv = event.target.closest('.skill_div');
            if (skillDiv) {
                skillDiv.remove(); // Remove the div from DOM
                updateIndexing(); // Update the index for remaining skill divs
            }
        });
    });

    // Update the indexes of skill name and rating inputs after a deletion
    function updateIndexing() {
        const skillDivs = document.querySelectorAll('.skill_div');
        
        skillDivs.forEach((div, newIndex) => {
            // Update the name and rating inputs with the new index
            const nameInput = div.querySelector(`input[name^="skill_name"]`);
            const ratingInputs = div.querySelectorAll(`input[name^="rating"]`);
            
            if (nameInput) {
                nameInput.name = `skill_name[${newIndex}]`;
                nameInput.id = `skill_name_${newIndex}`;
            }

            ratingInputs.forEach(input => {
                input.name = `rating[${newIndex}]`;
                input.id = input.id.replace(/\d+$/, newIndex); // Update the ID for each rating input
            });

            // Update the error divs
            const skillError = div.querySelector('.skill-error');
            const ratingError = div.querySelector('.rating-error');

            if (skillError) skillError.style.display = 'none';
            if (ratingError) ratingError.style.display = 'none';
        });
    }


    const get_skills_data = JSON.parse(document.getElementById("skill_data").value);
    console.log("data", get_skills_data);

    function populateSkills() {
        const skillsContainer = document.getElementById('skills_container');
        
        // Clear any existing skills (if necessary)
        skillsContainer.innerHTML = '';

        // Ensure the .skill_div template exists before trying to clone
        const skillDivTemplate = document.querySelector('.skill_div');
        if (!skillDivTemplate) {
            console.error("No skill_div template found in the DOM!");
            return;
        }

        get_skills_data.forEach((skillData, skillCount) => {
            // Clone the first skill_div template
            const newSkillDiv = skillDivTemplate.cloneNode(true);

            // Update the skill name input value
            const skillNameInput = newSkillDiv.querySelector(`input[name="skill_name[${skillCount}]"]`);
            if (skillNameInput) {
                skillNameInput.value = skillData.skill_name; // Populate skill name
            }

            // Update the rating radio buttons
            const ratingInputs = newSkillDiv.querySelectorAll(`input[name="rating[${skillCount}]"]`);
            const skillPercent = parseInt(skillData.skill_percent); // Ensure percent is a number
            
            // Set the correct radio button based on skill_percent
            ratingInputs.forEach((input) => {
                if (parseInt(input.value) === skillPercent) {
                    input.checked = true;
                } else {
                    input.checked = false;
                }
            });

            // Clear error messages (if any)
            const ratingError = newSkillDiv.querySelector('.rating-error');
            if (ratingError) {
                ratingError.style.display = 'none';
            }

            const nameError = newSkillDiv.querySelector('.skill-error');
            if (nameError) {
                nameError.style.display = 'none';
            }

            // Update the delete button event for this row
            newSkillDiv.querySelector('.delete_row_btn').addEventListener('click', function () {
                handleDelete(this);
            });

            // Append the new skill div to the container
            skillsContainer.appendChild(newSkillDiv);
        });

        // Check delete button visibility
        updateDeleteButtonVisibility();
    }

    populateSkills();


</script>

</html>