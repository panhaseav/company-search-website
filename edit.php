<?php
     //Sets the variable to $pagecss so navbar head could have the css page linked.
    $pagecss = 'edit.css';
     //Includes the navbar in the page.
    include "navbar.php";
     //Includes the connection in the page.
    include "connection.php";
     //Includes the editprocess in the page.
    include "editprocess.php";
    //getting id from url
    $id = $_GET['id'];
    //selecting data associated with this particular id
    $result = mysqli_query($connection, "SELECT * FROM company WHERE id=$id");
    //when the query is done it fetch all the rows assosiated  with the variable $result.
    while ($res = mysqli_fetch_array($result))
    {
        //All the information fetched is store accordingly to different variables
        $company_name = $res['company_name'];
        $company_size = $res['company_size'];
        $company_tags = $res['company_tags'];
        $company_url = $res['company_url'];
        $company_email = $res['company_email'];
        $company_phone = $res['company_phone'];
        $country = $res['country'];
        $company_description = $res['company_description'];
    }

?>


<div class="container">

    <?php
    //Check that if there is a value sucess for get.
    if (isset($_GET['sucess']))
    {
        //Checks that the get value is equal to the correspondent value.
        if ($_GET['sucess'] == "done")
        {
            //Prints the Sucess Message and i have includes a few link to go to home and view page.
            echo "<p class='sucess'>Company Updated Sucessfully <br><a href='/wpassignment/existing_company.php'>Click here to check the created company</a> <br> <a href='/wpassignment/admindashboard.php'>Click here for homePage </a></p>";
        }
    }
    ?>

    <h1>Edit Company </h1>

    <div class="new_user">

        <form  method="post" name="form1"  action="edit.php">

        <?php
            //Checks that if there is a value error for get.
            if (isset($_GET['error']))
            {
                //Checks that the get value error is equal to the correspondent value.
                if ($_GET['error'] == "Everything")
                {
                    //Prints the Error Message
                    echo "<font color='red'><p1>All Field are empty please Try Again</p1></font><br>";
                }
            }
        ?>


          <div class="row">
            <div class="col-25">
              <label for="fname">Company Name</label>
            </div>
            <div class="col-75">
              <input type="text"  name="company_name" placeholder="Your First name.." value="<?php echo $company_name ?>" required minlength="4" maxlength="100" >
            </div>
          </div>
          <?php
              //Checks that if there is a value error for get.
              if (isset($_GET['error']))
              {
                  //Checks that the get value error is equal to the correspondent value.
                  if ($_GET['error'] == "name")
                  {
                      //Prints the Error Message
                      echo "<font color='red'><p>Company Name field is empty</p></font>";
                  }
              }
          ?>

            <div class="row">
              <div class="col-25">
                <label for="lname">Company Size</label>
              </div>
              <div class="col-75">
                <select id="country" name ="company_size" >
                   <option value = "<?php echo $company_size; ?>"><?php echo $company_size; ?></option>
                   <option value = "domestic">domestic</option>
                   <option value = "international">International</option>
                   <option value = "multinational">multinational</option>
                </select>
              </div>
            </div>
          <?php
              //Checks that if there is a value error for get.
              if (isset($_GET['error']))
              {
                  //Checks that the get value error is equal to the correspondent value.
                  if ($_GET['error'] == "size")
                  {
                      //Prints the Error Message
                      echo "<font color='red'><p>Company size field is empty</p></font>";
                  }
              }
          ?>


            <div class="row">
              <div class="col-25">
                <label for="lname">Company Tags</label>
              </div>
              <div class="col-75">
                <input type="text"  name="company_tags" placeholder="Your last name.." value="<?php echo $company_name ?>" required minlength="3" maxlength="100" >
              </div>
            </div>
            <?php
                //Checks that if there is a value error for get.
                if (isset($_GET['error']))
                {
                    //Checks that the get value error is equal to the correspondent value.
                    if ($_GET['error'] == "tag")
                    {
                        //Prints the Error Message
                        echo "<font color='red'><p>Company tag field is empty</p></font>";
                    }
                }
            ?>

            <div class="row">
              <div class="col-25">
                <label for="lname">Company Website (URL)</label>
              </div>
              <div class="col-75">
                <input type="text"  name="company_url" placeholder="Your last name.." value="<?php echo $company_url; ?>"  required minlength="5" maxlength="100" >
              </div>
            </div>
            <?php
                //Checks that if there is a value error for get.
                if (isset($_GET['error']))
                {
                    //Checks that the get value error is equal to the correspondent value.
                    if ($_GET['error'] == "url")
                    {
                        //Prints the Error Message
                        echo "<font color='red'><p>Company url field is empty</p></font>";
                    }
                }
            ?>

            <div class="row">
              <div class="col-25">
                <label for="lname">Company Email Address</label>
              </div>
              <div class="col-75">
                <input type="email"  name="company_email" placeholder="Your Email Address.." value="<?php echo $company_email; ?>" required minlength="5" maxlength="100" >
              </div>
            </div>
            <?php
                          //Checks that if there is a value error for get.
                          if (isset($_GET['error']))
                          {
                              //Checks that the get value error is equal to the correspondent value.
                              if ($_GET['error'] == "email")
                              {
                                  //Prints the Error Message
                                  echo "<font color='red'><p>Company Email Address field is empty</p></font>";
                              }
                          }
                          //Checks that if there is a value error for get.
                          elseif (isset($_GET['error']))
                          {
                               //Checks that the get value error is equal to the correspondent value.
                              if ($_GET['error'] == "notemail")
                              {
                                  //Prints the Error Message
                                  echo "<font color='red'><p>input a correct email</p></font>";
                              }
                          }
                      ?>

            <div class="row">
              <div class="col-25">
                <label for="lname">Company Phone Number</label>
              </div>
              <div class="col-75">
                <input type="tel" name="company_phone" placeholder="Your Telephone Number.." value="<?php echo $company_phone; ?>" required minlength="10" maxlength="14" >
              </div>
            </div>
            <?php
                       //Checks that if there is a value error for get.
                   if (isset($_GET['error']))
                   {
                       //Checks that the get value error is equal to the correspondent value.
                       if ($_GET['error'] == "phone")
                       {
                           //Prints the Error Message
                           echo "<font color='red'><p>Company Phone Number field is empty</p></font>";
                       }
                   }
            ?>


          <div class="row">
            <div class="col-25">
              <label for="country">Country</label>
            </div>
            <div class="col-75">
              <select id="country" name="country" required>
                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                <option value = "EU">EU</option>
                <option value = "SEA">SEA</option>
                <option value = "NA">NA</option>
                <option value = "SA">SA</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote Divoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
              </select>
            </div>
          </div><br>
           <?php
                  //Checks that if there is a value error for get.
                  if (isset($_GET['error']))
                  {
                      //Checks that the get value error is equal to the correspondent value.
                      if ($_GET['error'] == "country")
                      {
                          //Prints the Error Message
                          echo "<font color='red'><p>Company country field is empty</p></font>";
                      }
                  }
            ?>

          <div class="row">
            <div class="col-25">
              <label for="subject">Company Desription</label>
            </div>
            <div class="col-75">
              <textarea  name="company_description"  placeholder="Write something.." style="height:200px" required minlength="20" maxlength="1000"  spellcheck="true"><?php echo $company_description; ?></textarea>
            </div>
          </div><br><br>
           <?php
                  //Checks that if there is a value error for get.
                  if (isset($_GET['error']))
                  {
                      //Checks that the get value error is equal to the correspondent value.
                      if ($_GET['error'] == "description")
                      {
                          //Prints the Error Message
                          echo "<font color='red'><p>Company description field is empty</p></font>";
                      }
                  }
              ?>

          <div class="row">
            <div class="sub">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <input type="submit" name="submit" value="Update"  >
          </div>
          </div>

        </form>
    </div>
</div>
</body>
</html>

