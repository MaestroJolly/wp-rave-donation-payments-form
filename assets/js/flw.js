'use strict';

var button, form, modalForm, modalDetails, payForm, fname, newamount, currencyOption, givings, country, email, donorAddress, more, phone, addy, transRef, donorFname, donorLname, donorEmail, donorNumber, donorAddress, verifyFname, verifyAmt, verifyCurr, verifyCount, verifyGiv, verifyEmail, verifyPhone, verifytransRef, verifyAddy, countryCode, adminSubAccountId, subAccountLists, subAccountIdLists, subAccountIds, subAccounts, subAccountArrays,
subaccountErr, editForm, modalSuccess, paymentMessage, modalAjaxLoader, goBack;


// Instantiate new modal
var modalOne = new Custombox.modal({
  content: {
    effect: 'fadein',
    target: '#hidden-modal-one'
  }
});

var modalTwo = new Custombox.modal({
  content: {
    effect: 'fadein',
    target: '#hidden-modal-two'
  }
});

var modalThree = new Custombox.modal({
  content: {
    effect: 'fadein',
    target: '#hidden-modal-three'
  }
});

var modalFour = new Custombox.modal({
  content: {
    effect: 'fadein',
    target: '#hidden-modal-four'
  }
});



// Get the modal
var modal = jQuery('#myModal');

// Get the button that opens the modal
var btn = jQuery('#myBtn');

// When the user clicks on the button, open the modal 
jQuery(document).on('click', btn, function(event) {
    if (event.target.id == "myBtn"){
      // Open
      modalOne.open();
    }
});

// When the user clicks anywhere outside of the modal, close it

form = jQuery("#pay-form");
redirectUrl;
modalDetails = jQuery(".modal-details");
modalForm = jQuery(".modal-form");
modalAjaxLoader = jQuery(".modal-loader");
more = jQuery("#more");
addy = jQuery("#hide");
newamount = jQuery("#newamount");
currencyOption = jQuery("#currency-option");
country = jQuery("#country");
givings = jQuery("#givings");
donorFname = jQuery("#fname");
donorLname = jQuery("#lname");
donorEmail = jQuery("#email");
donorNumber = jQuery("#phonenumber");
donorAddress = jQuery("#addy");
verifyFname = jQuery(".verify-fname");
verifyAmt = jQuery(".verify-amt");
verifyCurr = jQuery(".verify-curr");
verifyCount = jQuery(".verify-count");
verifyGiv = jQuery(".verify-giv");
verifytransRef = jQuery(".verify-transRef");
verifyEmail = jQuery(".verify-email");
verifyPhone = jQuery(".verify-phone");
verifyAddy = jQuery(".verify-addy");
subaccountErr = jQuery("#subaccount-error");
goBack = document.querySelector("#back-btn");


more.click(function(){
    addy.toggleClass("hide");
});

goBack.addEventListener('click', function(e){
  e.preventDefault();
  console.log("back");
  Custombox.modal.close();
  modalOne.open();
});

    form.submit(function(e){
      e.preventDefault();
      if (currencyOption.val() === 'Choose a currency' || country.val() === 'Choose Country' || givings.val() === 'Choose a purpose') {
        alert('All fields must be filled!');
      } else {
        subAccountLists = [];
        subAccountIdLists = [];
        subAccountIds =  flw_rave_options.sub_account_ids.split (",");
        subAccounts =  flw_rave_options.sub_accounts.split (",");
        subAccountIds.forEach(function(subAccountId){
          return subAccountIdLists.push(subAccountId);
        });

        subAccounts.forEach(function(subAccount){
          return subAccountLists.push(subAccount);
        });

        subAccountArrays = {};
        for (var i = 0; i < subAccountIdLists.length; i++) {
          var theSubAccountLists = subAccountLists[i];
          subAccountArrays[theSubAccountLists] = subAccountIdLists[i];
        }


        for (var subAccountArray in subAccountArrays) {
          // check if the property/key is defined in the object itself, not in parent
          if (subAccountArrays.hasOwnProperty(subAccountArray)) {           
              if (givings.val() == subAccountArray) {
                adminSubAccountId = subAccountArrays[subAccountArray];
              }
          }
        }

        
      if (donorAddress === ""){
        verifyAddy.text("");
      }else {
        verifyAddy.text(donorAddress.val());
      }
      transRef = "GVHR-"+Date.now();
      verifyFname.text(donorFname.val() +" "+donorLname.val());
      verifyAmt.text(newamount.val());
      verifyCurr.text(currencyOption.val());
      verifyCount.text(country.val());
      verifytransRef.text(transRef);
      verifyGiv.text(givings.val());
      verifyEmail.text(donorEmail.val());
      verifyPhone.text(donorNumber.val());

      switch (currencyOption.val()) {
          case "KES":
              countryCode = "KE";
              break;
          case "GHS":
              countryCode = "GH";
              break;
          case "ZAR":
              countryCode = "ZA";
              break;
          default:
              countryCode= "NG";
              break;
      }
      Custombox.modal.close();
      modalTwo.open();
    e.preventDefault();
  }
});


var payNow = jQuery("#paynow");

payNow.click(function(e) {
  e.preventDefault();
  var paymentObject = {
    amount: newamount.val(),
    customer_firstname: donorFname.val(),
    customer_lastname: donorLname.val(),
    customer_email: donorEmail.val(),
    country: countryCode,
    currency: currencyOption.val(),
    customer_phone: donorNumber.val(),
    custom_description: givings.val(),
    custom_logo: flw_rave_options.logo,
    custom_title: flw_rave_options.title,
    "meta": [{metaname: "Purpose Of Giving", metavalue: givings.val()}, {metaname: "Country", metavalue: country.val()}, {metaname: "Address", metavalue: donorAddress.val()}],
    PBFPubKey: flw_rave_options.pbkey,
    redirect_url: flw_rave_options.redirectUrl,
    txref: transRef,
    subaccounts: [{id: adminSubAccountId}],
    onclose: function() {

    },
    callback: function(res) {
      handleResponse(res, form);
      x.close();
    }
  }
  Custombox.modal.close();
  var x = getpaidSetup(paymentObject);
})



var handleResponse =  function(res, form) {
  modalThree.open();
    var args  = {
      action: 'process_payment',
      flw_sec_code: jQuery( form ).find( '#flw_sec_code' ).val(),
    };

    var dataObj = Object.assign( {}, args, res.tx );

    jQuery
      .post( flw_rave_options.cb_url, dataObj )
      .success( function(data) {
        // console.log(data);
    if(redirectUrl == '' || redirectUrl == undefined) {
      paymentMessage = jQuery("#notice");
      modalSuccess = jQuery(".modal-success");
      Custombox.modal.close();

      newamount.val();
      currencyOption.val();
      givings.val();
      country.val();
      donorFname.val();
      donorLname.val();
      donorEmail.val();
      donorNumber.val();
      donorAddress.val();

      form[0].reset();
      var displayModal = function(){
        paymentMessage.text('Thank you for your donation of '+res.tx["currency"] + " " + res.tx["amount"] + ". Your payment was "+res.tx["status"]);
        modalFour.open();
      }
      displayModal();
    } else {
      setTimeout(redirectTo, 5000, res.tx["redirect_url"]);
    }
  });
}




var submitForm = jQuery( '.flw-simple-pay-now-form' ),
  redirectUrl;

if ( submitForm ) {

  submitForm.submit(function(evt) {
    evt.preventDefault();
    var config = buildConfigObj( this );
    processCheckout( config );
  } );

}


/**
 * Builds config object to be sent to GetPaid
//  *
//  * @return object - The config object
//  */

var processCheckout = function(opts) {
  getpaidSetup( opts );
};

/**
 * Sends payment response from GetPaid to the process payment endpoint
 *
 * @param object Response object from GetPaid
 *
 * @return void
 */

/**
 * Redirect to set url
 *
 * @param string url - The link to redirect to
 *
 * @return void
 */
var redirectTo = function( url ) {

  if ( url ) {
    location.href = url;
  }

};
