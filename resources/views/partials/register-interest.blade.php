<div class="row">
    <!-- Register for Interest Title -->
    <div class="col-lg-12">
        <h2 class="mb-5 text-center">Register for Interest</h2>
    </div>
    <!-- Register Interest Form -->
    <div class="col-lg-12">
        <form id="register-interest-form" method="POST" action="{{ route('saveRegisterInterest') }}">
            @csrf
            <!-- 1. YOUR NAME -->
            <div class="row justify-content-center">
                <div class="form-group col-md-8">
                    <input type="text" name="name" class="form-control" placeholder="Name*" required>
                </div>
            </div>
            <!-- 2. YOUR PHONE NUMBER -->
            <div class="row justify-content-center">
                <div class="form-group col-md-8">
                    <input type="text" name="widget-contact-form-phone" class="form-control" placeholder="Contact Number*" required>
                </div>
            </div>
            <!-- 3. YOUR EMAIL -->
            <div class="row justify-content-center">
                <div class="form-group col-md-8">
                    <input type="email" name="email" class="form-control" placeholder="Email*" required>
                </div>
            </div>
            <!-- 4. PROJECT TYPE -->
            <div class="row justify-content-center">
                <div class="form-group col-md-8">
                    <select id="projectTypeDropdown" name="project_type" class="form-select" required>
                        @foreach(array_keys($projectOptions ?? []) as $type)
                            <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- 5. PROJECT NAME (grouped dropdown) -->
            <div class="row justify-content-center">
                <div class="form-group col-md-8">
                    <select id="projectNameDropdown" name="project_id" class="form-select" required>
                        @foreach(($projectOptions ?? []) as $type => $categories)
                            @foreach($categories as $category => $projects)
                                <optgroup label="{{ $type }} - {{ $category }}" data-type="{{ $type }}">
                                    @foreach($projects as $project)
                                        <option value="{{ $project['id'] }}">{{ $project['title'] }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- CHECKBOXES AND SUBMIT BUTTON -->
            <div class="row mt-3 justify-content-center">
                <div class="form-group col-md-8 mb-0">
                    <div class="form-group form-check my-3">
                        <input type="checkbox" class="form-check-input" id="chk4" name="chk4">
                        <label class="form-check-label" for="chk4">I hereby agree to receive future communication & newsletter from PGB.</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group col-md-8">
                    <div class="form-group form-check my-3">
                        <input type="checkbox" class="form-check-input" id="chk5" name="chk5">
                        <label class="form-check-label" for="chk5">I have read and agreed with the Terms and Conditions, Privacy Policy and PDPA Consent Clause.</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <button class="btn btn-outline col-md-8 mt-4" type="submit" id="form-submit"><i
                        class="fa fa-paper-plane"></i>&nbsp;SUBMIT</button>
            </div>
        <script>
            // Enable submit only when both checkboxes are checked, and show disabled status
            document.addEventListener('DOMContentLoaded', function() {
                var chk4 = document.getElementById('chk4');
                var chk5 = document.getElementById('chk5');
                var submitBtn = document.getElementById('form-submit');
                function updateSubmitState() {
                    var enabled = chk4.checked && chk5.checked;
                    submitBtn.disabled = !enabled;
                    if (!enabled) {
                        submitBtn.classList.add('disabled');
                        submitBtn.style.opacity = '0.6';
                        submitBtn.style.cursor = 'not-allowed';
                    } else {
                        submitBtn.classList.remove('disabled');
                        submitBtn.style.opacity = '';
                        submitBtn.style.cursor = '';
                    }
                }
                chk4.addEventListener('change', updateSubmitState);
                chk5.addEventListener('change', updateSubmitState);
                updateSubmitState();
            });
            // Filter PROJECT NAME dropdown based on PROJECT TYPE selection
            document.addEventListener('DOMContentLoaded', function() {
                var typeDropdown = document.getElementById('projectTypeDropdown');
                var nameDropdown = document.getElementById('projectNameDropdown');
                function filterProjectNames() {
                    var selectedType = typeDropdown.value;
                    Array.from(nameDropdown.getElementsByTagName('optgroup')).forEach(function(group) {
                        group.style.display = (selectedType === '' || group.getAttribute('data-type') === selectedType) ? '' : 'none';
                    });
                    // Reset project selection when type changes
                    nameDropdown.value = '';
                }
                typeDropdown.addEventListener('change', filterProjectNames);
                filterProjectNames();
            });
        </script>
        </form>
    </div>
</div>
