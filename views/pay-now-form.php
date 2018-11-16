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

  // if (empty($logo)) {
  //   $custom_logo = "<h4>Add Your Custom Logo Here</h4>";
  // }else{
  //   $custom_logo = $logo;
  // }

  // echo $custom_logo;
?>

<button class="flw flw-info flw-lg" id="myBtn">Give</button>

<div id="myModal" class="modal fade" role="dialog">

  <!-- Modal content-->
  <div class="modal-content modal-form">
    <div style="width: 100%"><span class="close">&times;</span></div>
    <div class="modal-header">
      <div style="margin: 0 auto">
        <?php if (!empty($logo)) {echo '<img src="'. esc_url($logo).'" >';}else{
          echo "<h4>Add Your Custom Logo Here</h4>";
        }?>
      </div>
    </div>
    <div class="modal-body">
  <div class="form">
  <form method="POST" action="" id="pay-form" <?php echo $data_attr; ?> autocomplete="off">
    <div class="row">
      <div class="flw-group flw-md-6">
        <label for="amount">Amount: </label>
        <input type="number" class="flw-control" id="amount" min="0" name="amount" value="" placeholder="Amount" required="required">
      </div>
      <div class="flw-group flw-md-6">
        <label for="currency-option">Currency:</label>
        <input list="currency" class="flw-control" id="currency-option" name="currency-option" placeholder="Choose a currency" required="required">
        <datalist id="currency">
            <option value="NGN">
            <option value="USD">
            <option value="GBP">
            <option value="EUR">
            <option value="KES">
            <option value="GHS">
            <option value="UGX">
            <option value="TZS">
        </datalist>
      </div>
      <div class="flw-group flw-md-6">
        <label for="givings">Giving For: </label>
        <input list="giving-for" class="flw-control" id="givings" name="givings" placeholder="Choose a purpose">
        <datalist id="giving-for">
        <?php foreach ($subaccounts as $subaccount) {?>
            <option value="<?php echo $subaccount ?>">
        <?php } ?>
        </datalist>
      </div>
      <div class="flw-group flw-md-6">
      <label for="country">Country: </label>
      <input list="country-choice" class="flw-control" id="country" name="country" placeholder="Choose Country" required="required">
      <datalist id="country-choice">
          <option value="Afghanistan">
          <option value="Albania">
          <option value="Algeria">
          <option value="Argentina">
          <option value="Australia">
          <option value="Bahamia">
          <option value="Bahrain">
          <option value="Bangladesh">
          <option value="Barbados">
          <option value="Belize">
          <option value="Bermuda">
          <option value="Bhuta">
          <option value="Bolivia">
          <option value="Botswana">
          <option value="Brazil">
          <option value="Burundi">
          <option value="Cambodia">
          <option value="Canada">
          <option value="Cape Verde">
          <option value="Cayman Islands">
          <option value="Chile">
          <option value="China">
          <option value="Colombia">
          <option value="Comoros Island">
          <option value="Costa Rica">
          <option value="Croatia">
          <option value="Cuba">
          <option value="Cyprus">
          <option value="Czech Republic">
          <option value="Denmark">
          <option value="Dijibouti">
          <option value="Dominican Republic">
          <option value="East Caribbean">
          <option value="Egypt">
          <option value="El Salvador">
          <option value="Estonia">
          <option value="Ethiopia">
          <option value="Falkland Islands">
          <option value="Gambia">
          <option value="Ghana">
          <option value="Gibraltar">
          <option value="Guatemala">
          <option value="Guinea Bissau">
          <option value="Guyana">
          <option value="Haiti">
          <option value="Honduras">
          <option value="Hong Kong">
          <option value="Hungary">
          <option value="Iceland">
          <option value="India">
          <option value="Indonesia">
          <option value="Iraq">
          <option value="Israel">
          <option value="Jamaica">
          <option value="Japan">
          <option value="Jordan">
          <option value="Kazakhstan">
          <option value="Kenya">
          <option value="Korea">
          <option value="Kuwait">
          <option value="Macedonia">
          <option value="Malawi">
          <option value="Malaysia">
          <option value="Maldives">
          <option value="Malta">
          <option value="Mauritania">
          <option value="Mauritius">
          <option value="Mexica">
          <option value="Moldova">
          <option value="Mongolia">
          <option value="Morocco">
          <option value="Mozambique">
          <option value="Myanmar">
          <option value="Namibia">
          <option value="Nepal">
          <option value="New Zealand">
          <option value="Nicaragua">
          <option value="Nigeria">
          <option value="North Korea">
          <option value="Norwegia">
          <option value="Oman">
          <option value="Pacific">
          <option value="Pakistan">
          <option value="Panama">
          <option value="Papua New Guinea">
          <option value="Paraguay">
          <option value="Peru">
          <option value="Philippines">
          <option value="Poland">
          <option value="Qatar">
          <option value="Romania">
          <option value="Russia">
          <option value="Samoa">
          <option value="Sao Tome and Principe">
          <option value="Saudi Arabia">
          <option value="Seychelles">
          <option value="Sierra Leone">
          <option value="Singapore">
          <option value="Slovakia">
          <option value="Slovenia">
          <option value="Solomon Islands">
          <option value="Somalia">
          <option value="South Africa">
          <option value="Sri Lanka">
          <option value="Sudan">
          <option value="Swaziland">
          <option value="Sweden">
          <option value="Turkey">
          <option value="Switzerland">
          <option value="Syria">
          <option value="Taiwan">
          <option value="Tanzania">
          <option value="Thailand">
          <option value="Ukraine">
          <option value="Uruguay">
          <option value="United Kindgom">
          <option value="United States">
          <option value="Venezuela">
          <option value="Vietnam">
          <option value="Yemen">
          <option value="Zambia">
          <option value="Zimbabwe">
      </datalist>
    </div>
    <div class="flw-group flw-md-6">
        <label for="fname">First Name: </label>
        <input type="text" class="flw-control" id="fname" name="amount" value="" placeholder="Enter Your First name" required="required">
    </div>
    <div class="flw-group flw-md-6">
        <label for="lname">Last Name: </label>
        <input type="text" class="flw-control" id="lname" name="amount" value="" placeholder="Enter Your Last name" required="required">
    </div>
    <div class="flw-group flw-md-6">
        <label for="email">Email: </label>
        <input type="email" class="flw-control" id="email" name="email" placeholder="Enter your valid email" required="required">
    </div>
    <div class="flw-group flw-md-6">
        <label for="phonenumber">Phone Number: </label>
        <input type="tel" class="flw-control" id="phonenumber" name="phonenumber" placeholder="e.g: +234800000000" required="required">
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
    <div class="modal-footer">
      <h4 class="modal-title" style="text-align: center; color: #ffffff">Thanks For Giving</h4>
    </div>
  </div>
</div>


  <div class="modal-content modal-details hide">
    <div style="width: 100%"><span class="close">&times;</span></div>
    <div class="modal-header">
      <div style="margin: 0 auto">
        <?php if (!empty($logo)) {echo '<img src="' . esc_url($logo) .'" >';}else{
            echo "<h4>Add Your Custom Logo Here</h4>";
        }?>
      </div>
    </div>
    <div style="margin: 20px;"><h4 style="color: #49A861; text-align: center">Please, confirm your details</h4></div>
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
      </div>
    </div>
    <div class="modal-footer">
      <h4 class="modal-title" style="text-align: center; color: #ffffff">Thanks For Giving</h4>
    </div>
  </div>

  <!--    Payment Loader Modal   -->

  <div class="modal-content modal-loader hide">
    <div class="modal-body" style="margin: 0px auto; padding: 100px;">
      <img class="loader" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/Spinner.gif'; ?>">
    </div>
  </div>


  <!--    Successful Payment Modal   -->

  <div class="modal-content modal-success hide">
    <div style="width: 100%"><span class="close">&times;</span></div>
    <div class="modal-header">
      <div style="margin: 0 auto">
        <?php if (!empty($logo)) {echo '<img src="' . esc_url($logo) .'" >';}else{
            echo "<h4>Add Your Custom Logo Here</h4>";
        }?>
      </div>
    </div>
    <div class="modal-body" style="margin: 0px auto; padding: 80px;">
      <?php wp_nonce_field( 'flw-rave-pay-nonce', 'flw_sec_code' ); ?>
      <h3 id="notice" style="color: #49A861; text-align: center">Please, confirm your details</h3>
    </div>
  </div>
</div>

<!-- <div>
  <form id="<?php echo $form_id ?>" class="flw-simple-pay-now-form" <?php echo $data_attr; ?> >
    <div id="notice"></div>
    <?php if ( empty( $atts['email'] ) ) : ?>

      <label class="pay-now"><?php _e( 'Email', 'rave-pay' ) ?></label>
      <input class="flw-form-input-text" id="flw-customer-email" type="email" placeholder="<?php _e( 'Email', 'rave-pay' ) ?>" required /><br>

    <?php endif; ?>

    <?php if ( empty( $atts['firstname'] ) ) : ?>

      <label class="pay-now"><?php _e( 'First Name', 'rave-pay' ) ?> (Optional) </label>
      <input class="flw-form-input-text" id="flw-first-name" type="text" placeholder="<?php _e( 'First Name', 'rave-pay' ) ?>" /><br>

    <?php endif; ?>

    <?php if ( empty( $atts['lastname'] ) ) : ?>

      <label class="pay-now"><?php _e( 'Last Name', 'rave-pay' ) ?> (Optional) </label>
      <input class="flw-form-input-text" id="flw-last-name" type="text" placeholder="<?php _e( 'Last Name', 'rave-pay' ) ?>" /><br>

    <?php endif; ?>

    <?php if ( empty( $atts['amount'] ) ) : ?>

      <label class="pay-now"><?php _e( 'Amount', 'rave-pay' ); ?></label>
      <input class="flw-form-input-text" id="flw-amount" type="text" placeholder="<?php _e( 'Amount', 'rave-pay' ); ?>" required /><br>

    <?php endif; ?>

    <?php if (empty($atts['currency'])) : ?>
      <label class="pay-now"><?php _e('Currency', 'rave-pay'); ?></label>
      <?php if (!empty($atts['custom_currency'])){ ?>

      <select class="flw-form-select" id="flw-currency" required>
        <?php foreach ($currencies as $currency): ?>
          <option value="<?php echo $currency ?>"><?php echo $currency ?></option>
        <?php endforeach; ?>
        </select>

      <?php } else{ ?>


      <?php if ($atts['country'] == "NG") : ?>
        <select class="flw-form-select" id="flw-currency" required>
          <option value="NGN">NGN</option>
          <option value="USD">USD</option>
          <option value="KES">KES</option>
          <option value="EUR">EUR</option>
          <option value="GBP">GBP</option>
        </select>
      <?php endif; ?>

      <?php if ($atts['country'] == "KE") : ?>
        <select class="flw-form-select" id="flw-currency" required>
          <option value="KES">KES</option>
        </select>
      <?php endif; ?>

      <?php if ($atts['country'] == "GH") : ?>
        <select class="flw-form-select" id="flw-currency" required>
          <option value="GHS">GHS</option>
          <option value="USD">USD</option>
        </select>
      <?php endif; ?>

      <?php if ($atts['country'] == "ZA") : ?>
        <select class="flw-form-select" id="flw-currency" required>
          <option value="ZAR">ZAR</option>
        </select>
      <?php endif; ?>

      <?php if ($atts['country'] == "US") : ?>
        <select class="flw-form-select" id="flw-currency" required>
          <option value="NGN">NGN</option>
          <option value="USD">USD</option>
          <option value="KES">KES</option>
          <option value="GHS">GHS</option>
          <option value="EUR">EUR</option>
          <option value="ZAR">ZAR</option>
          <option value="GBP">GBP</option>
        </select>
      <?php endif; ?>

        <?php 
      } ?>

    <?php endif; ?>
    <br>

    
    <button value="submit" class='flw-pay-now-button' href='#'><?php _e( $btn_text, 'rave-pay' ) ?></button>
  </form>
</div> -->
