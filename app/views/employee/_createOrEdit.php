<form id="Form_Employee" class="form-horizontal" method="post">

  <div class="form-body">

    <input type="hidden" id="employee_id" name="employee_id" class="form-control"/>
    <input type="hidden" id="user_id" name="user_id" class="form-control"/>

    <div class="alert alert-success display-hide">
      <button class="close" data-close="alert"></button>
      <span>
      </span>
    </div>
    <div class="alert alert-danger display-hide">
      <button class="close" data-close="alert"></button>
        <span>
         You have some form errors. Please check below.
        </span>
    </div>

    <!--<h3 class="form-section">Admission Info</h3>-->
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Employee #:<span class="required">*</span>
          </label>
          <div class="col-md-8">
            <input type="text" id="code" name="code" class="form-control"
                   placeholder="Employee #"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Date of Joining:<span class="required">*</span>
          </label>
          <div class="col-md-8">
            <input type="text" id="joining_date" name="joining_date" class="form-control date-picker"
                   placeholder="Date of joining" format="dd-MM-yyyy"/>
          </div>
        </div>
      </div>
    </div>

    <h4 class="form-section">Personal Detail</h4>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label class="control-label col-md-6">
            First name:<span class="required">*</span>
          </label>
          <div class="col-md-6">
            <input type="text" id="first_name" name="first_name" class="form-control"
                   placeholder="First name"/>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class="control-label col-md-6">
            Middle name:
          </label>
          <div class="col-md-6">
            <input type="text" id="middle_name" name="middle_name" class="form-control"
                   placeholder="Middle name"/>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class="control-label col-md-6">
            Last name:<span class="required">*</span>
          </label>
          <div class="col-md-6">
            <input type="text" id="last_name" name="last_name" class="form-control"
                   placeholder="Last name"/>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Date of birth:<span class="required">*</span>
          </label>
          <div class="col-md-8">
            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control date-picker"
                   placeholder="Date of birth" format="dd-MM-yyyy"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Gender:<span class="required">*</span>
          </label>
          <div class="col-md-8">
            <select id="gender" name="gender" class="form-control">
              <option value="1">Male</option>
              <option value="0">Female</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Marital Status:<span class="required">*</span>
          </label>
          <div class="col-md-8">
            <select id="marital_status" name="marital_status" class="form-control">
              <option value="1">Single</option>
              <option value="2">Married</option>
              <option value="3">Separated</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Dependents(Count):<span class="required">*</span>
          </label>
          <div class="col-md-8">
            <input type="text" id="children_count" name="children_count" class="form-control"
                   placeholder="Count of children"/>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Blood group:
          </label>
          <div class="col-md-8">
            <select id="blood_group" name="blood_group" class="form-control">
              <option value="Unknown">Unknown</option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Job Title:
          </label>
          <div class="col-md-8">
            <input type="text" id="job_title" name="job_title" class="form-control"
                   placeholder="Job Title"/>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Department:
          </label>
          <div class="col-md-8">
            <select id='employee_department_id' name='employee_department_id' class='form-control'>
              <option value=''>Select a department</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Position:
          </label>
          <div class="col-md-8">
            <select id='employee_position_id' name='employee_position_id' class='form-control'>
              <option value=''>Select a position</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Qualification:
          </label>
          <div class="col-md-8">
            <input type="text" id="qualification" name="qualification" class="form-control"
                   placeholder="Qualification"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Experience Details:
          </label>
          <div class="col-md-8">
            <textarea id="experience_detail" name="experience_detail" class="form-control"
                      placeholder="Details"></textarea>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="control-label col-md-4">
            Total Experience:
          </label>
          <div class="col-md-8">
            <select id="experience_year" class="form-control" name="experience_year">
              <option value="">Year</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
              <option value="32">32</option>
              <option value="33">33</option>
              <option value="34">34</option>
              <option value="35">35</option>
              <option value="36">36</option>
              <option value="37">37</option>
              <option value="38">38</option>
              <option value="39">39</option>
              <option value="40">40</option>
              <option value="41">41</option>
              <option value="42">42</option>
              <option value="43">43</option>
              <option value="44">44</option>
              <option value="45">45</option>
              <option value="46">46</option>
              <option value="47">47</option>
              <option value="48">48</option>
              <option value="49">49</option>
              <option value="50">50</option></select>

            <select id="experience_month" name="experience_month" class="form-control">
              <option value="">Month</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option></select>
          </div>
        </div>
      </div>
    </div>

    <h4 class="form-section">General Details</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Father Name:<span class="required">*</span>
          </label>
          <div class="col-md-8">
            <input type="text" id=father_name" name="father_name" class="form-control" placeholder="Father Name"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Mother Name:
          </label>
          <div class="col-md-8">
            <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="Mother Name"/>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Spouse Name<span class="required">*</span>
          </label>
          <div class="col-md-8">
            <input type="text" id="husband_name" name="husband_name" class="form-control" placeholder="Spouse Name"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">

          </label>
          <div class="col-md-8">

          </div>
        </div>
      </div>
    </div>

    <h4 class="form-section">Contact Detail</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Mobile Phone:<span class="required">*</span>
          </label>
          <div class="col-md-8">
            <input type="text" id="mobile_phone" name="mobile_phone" class="form-control" placeholder="Mobile Phone"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Home Phone:
          </label>
          <div class="col-md-8">
            <input type="text" id="home_phone" name="home_phone" class="form-control" placeholder="Home Phone"/>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Address 1:<span class="required">*</span>
          </label>
          <div class="col-md-8">
                        <textarea id="home_address_line1" name="home_address_line1" rows="4" class="form-control"
                                  placeholder="Address 1"></textarea>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Address 2:
          </label>
          <div class="col-md-8">
                        <textarea id="home_address_line2" name="home_address_line2" rows="4" class="form-control"
                                  placeholder="Address 2"></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Email:<span class="required">*</span>
          </label>
          <div class="col-md-8">
            <input type="text" id="email" name="email" class="form-control" placeholder="Email"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">

          </label>
          <div class="col-md-8">

          </div>
        </div>
      </div>
    </div>

    <h4 class="form-section">Settings</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label col-md-4">
            Biometric #:
          </label>
          <div class="col-md-8">
            <input type="text" id="biometric_id" name="biometric_id" class="form-control"
                   placeholder="Biometric #"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <!--<label class="control-label col-md-4">
            Address 2:<span class="required">*</span>
          </label>
          <div class="col-md-8">
            <textarea id="description" name="description" rows="4" class="form-control"></textarea>
          </div>-->
        </div>
      </div>
    </div>


    <h4 class="form-section">Upload Picture Detail</h4>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group ">
          <label class="control-label col-md-3">Photo</label>
          <div class="col-md-9">
            <div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                <img id="photo" name="photo"  src="../../assets/resource/default/employee.png" alt=""/>
              </div>
              <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
              </div>
              <div>
                            <span class="btn btn-default btn-file">
                                <span class="fileupload-new">
                                    <i class="fa fa-paper-clip"></i> Select image
                                </span>
                                <span class="fileupload-exists">
                                    <i class="fa fa-undo"></i> Change
                                </span>
                                <input type="file" id="employeePhoto" name="employeePhoto" class="default"/>
                            </span>
                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
              </div>
            </div>
                    <span class="label label-danger">
                         NOTE!
                    </span>
                    <span>
                         Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only
                    </span>
          </div>
        </div>
      </div>
    </div>



    <div class="form-actions fluid">
      <div class="col-md-offset-3 col-md-9">
        <a href="#" data-dismiss="modal" class="btn btn-default">
          <i class="fa fa-mail-reply"></i> Close
        </a>
        <button class="btn btn-success" type="submit">
          <i class="fa fa-save"></i> Save
        </button>
        <label>
          <div id="loader"><img src="<?php echo base_url() . "/assets/img/input-spinner.gif"; ?>"/></div>
        </label>
      </div>
    </div>

  </div>
</form>

