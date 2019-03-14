<?php

global $admin_settings;

  if ( ! defined( 'ABSPATH' ) ) { exit; }
  $form_id = FLW_Rave_Pay::gen_rand_string();
  if (!empty($atts['custom_currency'])) {
    if (preg_match('/^[a-z\d]* [a-z\d]*$/', $atts['custom_currency'])) {
      $currencies = explode(", ", $atts['custom_currency']);
    } else{
      $currencies = explode(",", $atts['custom_currency']);
    }
  }

  $subaccounts = explode(",", $admin_settings->get_option_value( 'sub_accounts' ));
  $logo = $admin_settings->get_option_value( 'modal_logo' );
?>

<button class="flw flw-info flw-lg" id="myBtn">Give</button>


<div style="display: none;" id="hidden-modal-one">
<div class="modal-bground">
<a href="javascript:void(0);" onclick="Custombox.modal.close();" style="float: right;" class="demo-close"><i class="fa fa-times"></i></a>
  <div class="modal-header">
      <div style="margin: 0 auto">
        <?php if (!empty($logo)) {echo '<img src="'. esc_url($logo).'" style="width: 100%;">';}else{
          echo "<h4>Add Your Custom Logo Here</h4>";
        }?>
      </div>
  </div>
  <div class="modal-body">
    <div class="form">
      <form method="POST" action="" id="pay-form" <?php echo $data_attr; ?> autocomplete="off">
        <div class="row">
          <div class="flw-group flw-md-6">
            <label for="newamount">Amount: <span style="color: #ff0000;">*</span></label>
            <input type="number" class="flw-control" id="newamount" min="0" name="amount" value="" placeholder="Amount" required="required">
          </div>
          <div class="flw-group flw-md-6">
            <label for="currency-option">Currency: <span style="color: #ff0000;">*</span></label>
            <select class="flw-control" id="currency-option" required="required">
                <option>Choose a currency</option>
                <option value="NGN">NGN</option>
                <option value="USD">USD</option>
                <option value="GBP">GBP</option>
                <option value="EUR">EUR</option>
                <option value="KES">KES</option>
                <option value="GHS">GHS</option>
                <option value="UGX">UGX</option>
                <option value="TZS">TZS</option>
            </select>
          </div>
          <div class="flw-group flw-md-6">
            <label for="givings">Giving For: <span style="color: #ff0000;">*</span></label>
            <select class="flw-control" id="givings" required="required">
              <option>Choose a purpose</option>
            <?php foreach ($subaccounts as $subaccount) {?>
                <option value="<?php echo $subaccount ?>"><?php echo $subaccount ?></option>
            <?php } ?>
            </select>
          </div>
          <div class="flw-group flw-md-6">
          <label for="country">Country: </label>
          <select class="flw-control" id="country">
              <option value="">Choose Country</option>
              <option value="Afghanistan">Afghanistan</option>
              <option value="Albania">Albania</option>
              <option value="Algeria">Algeria</option>
              <option value="Argentina">Argentina</option>
              <option value="Australia">Australia</option>
              <option value="Bahamia">Bahamia</option>
              <option value="Bahrain">Bahrain</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Barbados">Barbados</option>
              <option value="Belize">Belize</option>
              <option value="Bermuda">Bermuda</option>
              <option value="Bhuta">Bhuta</option>
              <option value="Bolivia">Bolivia</option>
              <option value="Botswana">Botswana</option>
              <option value="Brazil">Brazil</option>
              <option value="Burundi">Burundi</option>
              <option value="Cambodia">Cambodia</option>
              <option value="Canada">Canada</option>
              <option value="Cape Verde">Cape Verde</option>
              <option value="Cayman Islands">Cayman Islands</option>
              <option value="Chile">Chile</option>
              <option value="China">China</option>
              <option value="Colombia">Colombia</option>
              <option value="Comoros Island">Comoros Island</option>
              <option value="Costa Rica">Costa Rica</option>
              <option value="Croatia">Croatia</option>
              <option value="Cuba">Cuba</option>
              <option value="Cyprus">Cyprus</option>
              <option value="Czech Republic">Czech Republic</option>
              <option value="Denmark">Denmark</option>
              <option value="Dijibouti">Dijibouti</option>
              <option value="Dominican Republic">Dominican Republic</option>
              <option value="East Caribbean">East Caribbean</option>
              <option value="Egypt">Egypt</option>
              <option value="El Salvador">El Salvador</option>
              <option value="Estonia">Estonia</option>
              <option value="Ethiopia">Ethiopia</option>
              <option value="Falkland Islands">Falkland Islands</option>
              <option value="Gambia">Gambia</option>
              <option value="Ghana">Ghana</option>
              <option value="Gibraltar">Afghanistan</option>
              <option value="Guatemala">Afghanistan</option>
              <option value="Guinea Bissau">Guinea Bissau</option>
              <option value="Guyana">Guyana</option>
              <option value="Haiti">Haiti</option>
              <option value="Honduras">Honduras</option>
              <option value="Hong Kong">Hong Kong</option>
              <option value="Hungary">Hungary</option>
              <option value="Iceland">Iceland</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Iraq">Iraq</option>
              <option value="Israel">Israel</option>
              <option value="Jamaica">Jamaica</option>
              <option value="Japan">Japan</option>
              <option value="Jordan">Jordan</option>
              <option value="Kazakhstan">Kazakhstan</option>
              <option value="Kenya">Kenya</option>
              <option value="Korea">Korea</option>
              <option value="Kuwait">Kuwait</option>
              <option value="Macedonia">Macedonia</option>
              <option value="Malawi">Malawi</option>
              <option value="Malaysia">Malaysia</option>
              <option value="Maldives">Maldives</option>
              <option value="Malta">Malta</option>
              <option value="Mauritania">Mauritania</option>
              <option value="Mauritius">Mauritius</option>
              <option value="Mexica">Mexica</option>
              <option value="Moldova">Moldova</option>
              <option value="Mongolia">Mongolia</option>
              <option value="Morocco">Morocco</option>
              <option value="Mozambique">Mozambique</option>
              <option value="Myanmar">Myanmar</option>
              <option value="Namibia">Namibia</option>
              <option value="Nepal">Nepal</option>
              <option value="New Zealand">New Zealand</option>
              <option value="Nicaragua">Nicaragua</option>
              <option value="Nigeria">Nigeria</option>
              <option value="North Korea">North Korea</option>
              <option value="Norwegia">Norwegia</option>
              <option value="Oman">Oman</option>
              <option value="Pacific">Pacific</option>
              <option value="Pakistan">Pakistan</option>
              <option value="Panama">Panama</option>
              <option value="Papua New Guinea">Papua New Guinea</option>
              <option value="Paraguay">Paraguay</option>
              <option value="Peru">Peru</option>
              <option value="Philippines">Philippines</option>
              <option value="Poland">Poland</option>
              <option value="Qatar">Qatar</option>
              <option value="Romania">Romania</option>
              <option value="Russia">Russia</option>
              <option value="Samoa">Samoa</option>
              <option value="Sao Tome and Principe">Sao Tome and Principe</option>
              <option value="Saudi Arabia">Saudi Arabia</option>
              <option value="Seychelles">Seychelles</option>
              <option value="Sierra Leone">Sierra Leone/option>
              <option value="Singapore">Singapore</option>
              <option value="Slovakia">Slovakia</option>
              <option value="Slovenia">Slovenia</option>
              <option value="Solomon Islands">Solomon Islands</option>
              <option value="Somalia">Somalia</option>
              <option value="South Africa">South Africa</option>
              <option value="Sri Lanka">Sri Lanka</option>
              <option value="Sudan">Sudan</option>
              <option value="Swaziland">Swaziland</option>
              <option value="Sweden">Sweden</option>
              <option value="Switzerland">Switzerland</option>
              <option value="Syria">Syria</option>
              <option value="Taiwan">Taiwan</option>
              <option value="Tanzania">Tanzania</option>
              <option value="Thailand">Thailand</option>
              <option value="Turkey">Turkey</option>
              <option value="Ukraine">Ukraine</option>
              <option value="Uruguay">Uruguay</option>
              <option value="United Kindgom">United Kindgom</option>
              <option value="United States">United States</option>
              <option value="Venezuela">Venezuela</option>
              <option value="Vietnam">Vietnam</option>
              <option value="Yemen">Yemen</option>
              <option value="Zambia">Zambia</option>
              <option value="Zimbabwe">Zimbabwe</option>
          </select>
        </div>
        <div class="flw-group flw-md-6">
            <label for="fname">First Name: </label>
            <input type="text" class="flw-control" id="fname" name="amount" value="" placeholder="Enter Your First name">
        </div>
        <div class="flw-group flw-md-6">
            <label for="lname">Last Name: </label>
            <input type="text" class="flw-control" id="lname" name="amount" value="" placeholder="Enter Your Last name">
        </div>
        <div class="flw-group flw-md-6">
            <label for="email">Email: <span style="color: #ff0000;">*</span></label>
            <input type="email" class="flw-control" id="email" name="email" placeholder="Enter your valid email" required="required">
        </div>
        <div class="flw-group flw-md-6">
            <label for="phonenumber">Phone Number: </label>
            <input type="tel" class="flw-control" id="phonenumber" name="phonenumber" placeholder="e.g: +234800000000">
        </div>
        <div class="flw-md-12"><p id="more"><a href="#">Add Address (Optional)</a></p></div>
        <div class="flw-group flw-md-12 hide" id="hide">
            <label for="addy">Address: </label>
            <textarea id="addy"></textarea>
        </div>
        <div class="flw-md-12">
          <button type="submit" name="submit" class="flw flw-info flw-lg" style="display: block; margin: auto">Give</button>
        </div>
        </div>
        </form>
      </div>
      <div style="text-align: center; padding-top: 30px;">
        <h5 style="text-align: center; color: #5cb85c">Thanks For Giving</h5>
      </div>
      </div>
      <div class="modal-footer">
        <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ). 'assets/images/flwbadge-3.svg' ; ?>" class="footer-img-center">
      </div>
  </div>
</div>

<div style="display: none;" id="hidden-modal-two">
  <div class="modal-bground">
  <a href="javascript:void(0);" onclick="Custombox.modal.close();" style="float: right;" class="demo-close"><i class="fa fa-times"></i></a>
      <div class="modal-header">
        <div style="margin: 0 auto">
        <?php if (!empty($logo)) {echo '<img src="' . esc_url($logo) .'" style="width: 100%;">';}else{
              echo "<h4>Add Your Custom Logo Here</h4>";
          }?>
        </div>
      </div>
      <div style="margin: 20px;"><h4 style="color: #49A861; text-align: center">Please confirm your details</h4></div>
      <div class="modal-body">
        <div id="subaccount-error"></div>
        <div id="<?php echo $form_id ?>"  class="flw-table-responsive">
          <table id="table">
            <tr>
              <td>Full Name: </td>
              <td><span class="verify-fname"> </span></td>
            </tr>
            <tr>
              <td>Amount: </td>
              <td><span class="verify-amt"> </span></td>
            </tr>
            <tr>
              <td>Currency: </td>
              <td><span class="verify-curr"> </span></td>
            </tr>
            <tr>
              <td>Country: </td>
              <td><span class="verify-count"> </span></td>
            </tr>
            <tr>
              <td>Trx Ref: </td>
              <td><span class="verify-transRef"> </span></td>
            </tr>
            <tr>
              <td>Giving: </td>
              <td><span class="verify-giv"> </span></td>
            </tr>
            <tr>
              <td>Email: </td>
              <td><span class="verify-email"> </span></td>
            </tr>
            <tr>
              <td>Phone Number: </td>
              <td><span class="verify-phone"> </span></td>
            </tr>
            <tr>
              <td>Address: </td>
              <td><span class="verify-addy"> </span></td>
            </tr>
          </table>
        </div>
        <div class="flw-md-12">
          <button type="submit" name="submit" id="paynow" class="flw flw-info flw-lg flw-simple-pay-now-form" style="display: block; margin: auto">Proceed</button>
          <button type="submit" name="submit" id="back-btn" class="flw flw-info flw-lg flw-simple-pay-now-form" style="display: block; margin-top: 10px; margin-left: auto; margin-right: auto;">Go Back</button>
        </div>
      </div>
      <div style="text-align: center; padding-top: 30px;">
          <h5 style="text-align: center; color: #5cb85c">Thanks For Giving</h5>
        </div>
        <div class="modal-footer">
          <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ). 'assets/images/flwbadge-3.svg' ; ?>" class="footer-img-center">
      </div>
    </div>
</div>

<!--    Payment Loader Modal   -->

  <div style="display: none;" id="hidden-modal-three">
    <div class="modal-bground">
      <div class="modal-body" style="margin: 0px auto; padding: 20px;">
        <img class="loader" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/Spinner.gif'; ?>">
      </div>
    </div>
  </div>


  <!--    Successful Payment Modal   -->

  <div style="display: none;" id="hidden-modal-four">
    <div class="modal-bground">
    <a href="javascript:void(0);" onclick="Custombox.modal.close();" style="float: right;" class="demo-close"><i class="fa fa-times"></i></a>
      <div class="modal-header">
        <div style="margin: 0 auto">
        <?php if (!empty($logo)) {echo '<img src="' . esc_url($logo) .'" style="width: 100%;">';}else{
              echo "<h4>Add Your Custom Logo Here</h4>";
          }?>
        </div>
      </div>
      <div class="modal-body" style="margin: 0px auto; padding: 80px;">
        <?php wp_nonce_field( 'flw-rave-pay-nonce', 'flw_sec_code' ); ?>
        <h3 id="notice" style="color: #49A861; text-align: center"></h3>
      </div>
    </div>
  </div>


