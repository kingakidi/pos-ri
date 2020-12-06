
<!-- CHECK PROFILE UPDATE OR UPDATE  -->
<form action="" id="profile-update-form">
        <h5 class="text-center color">Profile Update</h5>
        <div class="error puf-error" id="error-puf"></div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="Username"
                disabled
                value="<?php echo $u; ?>"
              />
            </div>
            <div class="error"></div>
          </div>
          <div class="col-sm">
            <div class="form-group">
              <input
                type="email"
                class="form-control"
                placeholder="Email"
                disabled
                value="<?php echo $e; ?>"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Surname" id="surname" autocomplete="off"/>
              <div class="error error-surname" id="error-surname"></div>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="Other names"
                id="othername"
              />
              <div class="error error-othername" id="error-othername" autocomplete="off"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <input
                type="date"
                class="form-control"
                placeholder="Date of Birth"
                id="dob"
              />
              <div class="error error-dob" id="error-dob"></div>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
              <select name="gender" id="gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <div class="error error-gender" id="error-gender"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Address" id="address" autocomplete="off"/>
              <div class="error error-address" id="error-address" ></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="Country"
                value="Nigeria"
                disabled
                id="country"
              />
              <div class="error error-country" id="error-country"></div>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
              <select
                onchange="toggleLGA(this);"
                name="state"
                id="state"
                class="form-control"
              >
                <option value="" selected="selected">- Select State -</option>
                <option value="Abia">Abia</option>
                <option value="Adamawa">Adamawa</option>
                <option value="AkwaIbom">AkwaIbom</option>
                <option value="Anambra">Anambra</option>
                <option value="Bauchi">Bauchi</option>
                <option value="Bayelsa">Bayelsa</option>
                <option value="Benue">Benue</option>
                <option value="Borno">Borno</option>
                <option value="Cross River">Cross River</option>
                <option value="Delta">Delta</option>
                <option value="Ebonyi">Ebonyi</option>
                <option value="Edo">Edo</option>
                <option value="Ekiti">Ekiti</option>
                <option value="Enugu">Enugu</option>
                <option value="FCT">FCT</option>
                <option value="Gombe">Gombe</option>
                <option value="Imo">Imo</option>
                <option value="Jigawa">Jigawa</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Kano">Kano</option>
                <option value="Katsina">Katsina</option>
                <option value="Kebbi">Kebbi</option>
                <option value="Kogi">Kogi</option>
                <option value="Kwara">Kwara</option>
                <option value="Lagos">Lagos</option>
                <option value="Nasarawa">Nasarawa</option>
                <option value="Niger">Niger</option>
                <option value="Ogun">Ogun</option>
                <option value="Ondo">Ondo</option>
                <option value="Osun">Osun</option>
                <option value="Oyo">Oyo</option>
                <option value="Plateau">Plateau</option>
                <option value="Rivers">Rivers</option>
                <option value="Sokoto">Sokoto</option>
                <option value="Taraba">Taraba</option>
                <option value="Yobe">Yobe</option>
                <option value="Zamfara">Zamafara</option>
              </select>
              <div class="error error-state" id="error-state"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <select name="" id="lga" class="form-control select-lga">
                <option value="">Select State First</option>
              </select>
              <div class="error error-lga" id="error-lga"></div>
            </div>
          </div>
          <div class="col-sm">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="BRANCH" id="branch"/>
              <div class="error error-branch" id="error-branch"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <input type="submit" class="btn btn-info" id="profile-update"/>
            </div>
          </div>
        </div>
      </form>